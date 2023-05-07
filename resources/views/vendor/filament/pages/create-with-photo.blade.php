<x-dynamic-component
        :component="$getFieldWrapperView()"
        :id="$getId()"
        :label="$getLabel()"
        :label-sr-only="$isLabelHidden()"
        :helper-text="$getHelperText()"
        :hint="$getHint()"
        :hint-action="$getHintAction()"
        :hint-color="$getHintColor()"
        :hint-icon="$getHintIcon()"
        :required="$isRequired()"
        :state-path="$getStatePath()"
>
    <div {{ $attributes->merge($getExtraAttributes())->class(['filament-forms-text-input-component flex items-center space-x-2 rtl:space-x-reverse group']) }}>
        <style>
            #video {

                min-width: 100%;
                /*height: 240px;*/
            }

            #photo {

                min-width: 100%;
                height: 240px;
            }

            #canvas {
                display: none;
            }

            .camera {
                width: 100%;
                display: inline-block;
            }

            .output {
                display: inline-block;
            }
            .camera__controls-wrapper{
                display: flex;
                align-items: center;
                gap: 20px;
                padding: 20px 0;
            }

        </style>

        {{--INPUT--}}
        <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
            <!-- Interact with the `state` property in Alpine.js -->
            <input id="data.photo" name="photo" hidden type="file" wire:model.defer="{{ $getStatePath() }}"/>
            {{--<input type="hidden" name="photo" wire:model="photo" />--}}
        </div>
        {{--!INPUT--}}


        {{--CONTENT--}}

        @if(isset($getExtraAttributes()['src']))
            <img src="http://filament.loc/storage/{{ $getExtraAttributes()['src'] }}" alt="">
        @else
            <div>

                <div>
                    {{--<div class="dropdown my-3">--}}
                    {{--    <button class="btn btn-secondary dropdown-toggle" type="button" id="cameraDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--        Выберите камеру--}}
                    {{--    </button>--}}
                    {{--    <div class="dropdown-menu" aria-labelledby="cameraDropdown" id="cameraList">--}}
                    {{--    </div>--}}
                    {{--</div>--}}

                    <div>

                        <div class="camera">
                            <video id="video">Видео недоступно</video>
                            <div class="camera__controls-wrapper">
                            <div class="toggle">
                                <div class="filament-forms-field-wrapper">

                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                                            <label class="filament-forms-field-wrapper-label inline-flex items-center space-x-3 rtl:space-x-reverse" for="camera-toggle">
                                                <button x-data="{ state: true }" role="switch" aria-checked="true" x-bind:aria-checked="state?.toString()" x-on:click="state = ! state" x-bind:class="{
                    'bg-primary-600': state,
                    'bg-gray-200 ': ! state,
                }" wire:loading.attr="disabled" type="button" id="camera-toggle" class="filament-forms-toggle-component relative inline-flex border-2 border-transparent shrink-0 h-6 w-11 rounded-full cursor-pointer transition-colors ease-in-out duration-200 outline-none disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none bg-gray-200">
                <span class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 ease-in-out transition duration-200 translate-x-0" x-bind:class="{
                        'translate-x-5 rtl:-translate-x-5': state,
                        'translate-x-0': ! state,
                    }">
                    <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200" aria-hidden="true" x-bind:class="{
                            'opacity-0 ease-out duration-100': state,
                            'opacity-100 ease-in duration-200': ! state,
                        }">
                                            </span>

                    <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-0 ease-out duration-100" aria-hidden="true" x-bind:class="{
                            'opacity-100 ease-in duration-200': state,
                            'opacity-0 ease-out duration-100': ! state,
                        }">
                                            </span>
                </span>
                                                </button>

                                                <span class="text-sm font-medium leading-4 text-gray-700">

        камера    </span>

                                            </label>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action" id="snap">Сделать снимок</div>
                            </div>
                        </div>
                    </div>
                    <div >
                        <canvas id="canvas">
                        </canvas>

                        <div class="output">
                            <img id="photo" wire:ignore alt="здесь появится сохранённое изображение">
                        </div>


                    </div>
                </div>
            </div>
            {{--!CONTENT--}}

            <script>
            // TOGGLE CAMERA


              (function() {
                // The width and height of the captured photo. We will set the
                // width to the value defined here, but the height will be
                // calculated based on the aspect ratio of the input stream.

                var width = 1920;    // We will scale the photo width to this
                var height = 0;     // This will be computed based on the input stream

                // |streaming| indicates whether or not we're currently streaming
                // video from the camera. Obviously, we start at false.

                var streaming = false;

                // The various HTML elements we need to configure or control. These
                // will be set by the startup() function.

                var video = null;
                var canvas = null;
                var photo = null;
                var snap = null;

                function startup() {

                  video = document.getElementById('video');
                  canvas = document.getElementById('canvas');
                  photo = document.getElementById('photo');
                  snap = document.getElementById('snap');
                  const toggleCamera = document.querySelector('#camera-toggle');
                  let isCameraOn = true;
                  let videoStream = null;
                  navigator.mediaDevices.getUserMedia({video: true, audio: false})
                      .then(function(stream) {
                        video.srcObject = stream;
                        video.play();
                      })
                      .catch(function(err) {
                        console.log("An error occurred: " + err);
                      });

                  toggleCamera.addEventListener('click', function() {
                    isCameraOn = !isCameraOn; // toggle the camera state

                    if (isCameraOn) {
                      // turn on the camera
                      // video.srcObject = videoStream;
                      video.play();
                      toggleCamera.setAttribute('aria-checked', 'true');
                    } else {
                      // turn off the camera
                      // video.srcObject = null;
                      video.pause();
                      toggleCamera.setAttribute('aria-checked', 'false');
                    }

                    console.log('Toggle state changed:', isCameraOn);
                  });


                  // var deviceId;

                  // $(document).ready(function() {
                  //   $('.dropdown-toggle').dropdown();
                  // });

                  // navigator.mediaDevices.enumerateDevices()
                  //     .then(function(devices) {
                  //       var cameras = devices.filter(function(device) {
                  //         return device.kind === 'videoinput';
                  //       });
                  //
                  //       var cameraList = document.getElementById('cameraList');
                  //
                  //       cameras.forEach(function(camera) {
                  //         var option = document.createElement('a');
                  //         option.classList.add('dropdown-item');
                  //         option.textContent = camera.label;
                  //
                  //         if (!camera.label) {
                  //           option.textContent = camera.deviceId
                  //         }
                  //
                  //         option.setAttribute('data-device-id', camera.deviceId);
                  //
                  //         option.addEventListener('click', function(event) {
                  //           event.preventDefault();
                  //           deviceId = camera.deviceId;
                  //           cameraDropdown.querySelector('.dropdown-toggle').textContent = option.textContent;
                  //         });
                  //
                  //         cameraList.appendChild(option);
                  //       });
                  //     })
                  //     .catch(function(err) {
                  //       console.log(err.name + ": " + err.message);
                  //     });

                  // navigator.mediaDevices.getUserMedia({video: {deviceId: deviceId, width: {exact: 1920}, height: {exact: 0}}})
                  //     .then(function(stream) {
                  //       var video = document.getElementById('video');
                  //       video.srcObject = stream;
                  //       video.onloadedmetadata = function(e) {
                  //         video.play();
                  //       };
                  //     })
                  //     .catch(function(err) {
                  //       console.log(err.name + ": " + err.message);
                  //     });


                  video.addEventListener('canplay', function(ev) {
                    if (!streaming) {
                      height = video.videoHeight / (video.videoWidth / width);

                      // Firefox currently has a bug where the height can't be read from
                      // the video, so we will make assumptions if this happens.

                      if (isNaN(height)) {
                        height = width / (4 / 3);
                      }

                      video.setAttribute('width', width);
                      video.setAttribute('height', height);
                      canvas.setAttribute('width', width);
                      canvas.setAttribute('height', height);
                      streaming = true;
                    }
                  }, false);


                  snap.addEventListener('click', function(ev) {
                    ev.preventDefault();
                    takepicture();
                  }, false);


                  clearphoto();
                }

                // Fill the photo with an indication that none has been
                // captured.

                function clearphoto() {
                  var context = canvas.getContext('2d');
                  context.fillStyle = "#AAA";
                  context.fillRect(0, 0, canvas.width, canvas.height);

                  var data = canvas.toDataURL('image/png');
                  photo.setAttribute('src', data);
                }

                // Capture a photo by fetching the current contents of the video
                // and drawing it into a canvas, then converting that to a PNG
                // format data URL. By drawing it on an offscreen canvas and then
                // drawing that to the screen, we can change its size and/or apply
                // other changes before drawing it.

                function takepicture() {
                  var context = canvas.getContext('2d');
                  if (width && height) {
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(video, 0, 0, width, height);
                    var data = canvas.toDataURL('image/png');
                    photo.setAttribute('src', data);
                  } else {
                    clearphoto();
                  }
                  canvas.toBlob(function(blob) {
                    var file = new File([blob], "name");
                    // const fileInput = document.getElementById('fileInput');
                    // const dataTransfer = new DataTransfer()
                    // dataTransfer.items.add(file)
                    // fileInput.files = dataTransfer.files
                  @this.upload('data', file, (filename) => {
                    // Success callback.
                    // const fileInput = document.getElementById('data.photo');
                    // fileInput.value = filename;
                    // window.livewire.find($("#data.photo").attr('data.photo')).set('photo', filename);
                      {{--Livewire.set('{{ $getStatePath() }}', 'photo', filename);--}}

                    // setDirtyState(fileInput, filename);
                    console.log('success!')
                    console.log(filename)
                  @this.set('data.photo', filename)
                    // console.log(@this.get('file'))
                  }, () => {
                    // Error callback.
                  }, (event) => {
                    console.log(event);
                    // Progress callback.
                    // event.detail.progress contains a number between 1 and 100 as the upload progresses.
                  });
                  }, 'image/png');
                  // console.log($wire.__instance)
                  // $wire.set('photo', 'filename')
                }


                window.addEventListener('load', startup, false);
              })();
            </script>
        @endif
    </div>
</x-dynamic-component>

