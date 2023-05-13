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
    <div {{ $attributes->merge($getExtraAttributes())->class(['filament-forms-text-input-component flex items-center space-x-2 rtl:space-x-reverse group webcam-wrapper']) }}>
        <style>
            .webcam-wrapper {
                overflow: hidden;
                display: block;
            }

            #video {
                width: 100%;
                /*min-width: 100%;*/
                /*height: 240px;*/
                position: relative;
            }


            #output {
                display: inline-block;
                width: 100%;
                /*height: 240px;*/
            }

            #canvas {
                display: none;
            }

            .camera {
                width: 100%;
                display: inline-block;
                position: relative;
            }
            .loading.camera::after {
                content: "";
                position: absolute;
                width: 147px;
                height: 147px;
                background-image: url("{{ asset('img/ajax-loader-orange-transparent.gif') }}");
                background-size: auto;
                background-repeat: no-repeat;
                top: 40%;
                left: 50%;
                transform: translateX(-50%)translateY(-50%) ;
                z-index: 1;
            }


            .camera__controls-wrapper {
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
            <img src="{{ asset( 'storage/'.$getExtraAttributes()['src']) }}" alt="">
        @else


            {{--SLIDER--}}
            <div class="section-tabs" wire:ignore>
                <!-- Swiper Tab -->
                <div class="swiper-container swiper-tabs-nav">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            Камера
                        </div>
                        <div class="swiper-slide">
                            Снимок
                        </div>

                    </div>
                </div>
            </div>
            <!-- Swiper Content -->
            <div class="swiper-container swiper-tabs-content" wire:ignore>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="camera">
                            <video id="video">Видео недоступно</video>

                            <div class="camera__controls-wrapper">
                                <div class="toggle">
                                    <div class="filament-forms-field-wrapper">
                                        <div class="space-y-2">
                                            <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                                                <label class="filament-forms-field-wrapper-label inline-flex items-center space-x-3 rtl:space-x-reverse" for="camera-toggle">
                                                    <button x-data="{ state: true }" role="switch" aria-checked="true" x-bind:aria-checked="state?.toString()" x-on:click="state = ! state" x-bind:class="{'bg-primary-600': state,'bg-gray-200 ': ! state,}" wire:loading.attr="disabled" type="button" id="camera-toggle" class="filament-forms-toggle-component relative inline-flex border-2 border-transparent shrink-0 h-6 w-11 rounded-full cursor-pointer transition-colors ease-in-out duration-200 outline-none disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none bg-gray-200">
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
                            'opacity-0 ease-out duration-100': ! state,}">
                                            </span>
                </span>

                                                    </button>

                                                    <span class="text-sm font-medium leading-4 text-gray-700">камера</span>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action cursor-pointer"
                                        id="snap"><svg class="filament-button-icon w-5 h-5 mr-1 -ml-2 rtl:ml-1 rtl:-mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Сделать снимок</span>
                                </div>
                                <audio id="my-audio" src="{{ asset('audio/snapshot-sound.mp3') }}"></audio>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="output">
                            <canvas id="canvas">
                            </canvas>
                            <img id="output"  wire:ignore alt="здесь появится сохранённое изображение">
                        </div>
                    </div>

                </div>
            </div>


            <style>

                .section-tabs {
                    padding-top: 15px
                }

                .swiper-container {
                    margin-left: auto;
                    margin-right: auto;
                    position: relative;
                    overflow: hidden;
                    list-style: none;
                    padding: 0;
                    z-index: 1;
                }

                .swiper-container-android .swiper-slide, .swiper-wrapper {
                    transform: translate3d(0px, 0, 0);
                }

                .swiper-wrapper {
                    position: relative;
                    width: 100%;
                    height: calc(100% + 60px);
                    z-index: 1;
                    display: flex;
                    transition-property: transform;
                    box-sizing: content-box;
                }

                .swiper-slide {
                    flex-shrink: 0;
                    width: 100%;
                    height: 100%;
                    position: relative;
                    transition-property: transform;

                }

                .section-tabs .swiper-tabs-nav .swiper-slide {
                    text-align: center;
                    padding-bottom: 10px;
                    border-bottom: 2px solid #f4f6f5;
                    font-weight: 600;
                    transition: all 0.3s ease-in-out;
                    cursor: pointer
                }

                .section-tabs .swiper-tabs-nav .swiper-slide.swiper-slide-thumb-active {
                    font-weight: 700;
                    color: rgb(217, 119, 6);
                    border-color: rgb(217, 119, 6)
                }

                .section-tabs .swiper-tabs-content .swiper-slide {
                    padding: 25px 15px
                }

                .section-tabs .swiper-tabs-content .swiper-slide .full-height {
                    display: flex;
                    flex-direction: column;
                    min-height: calc(65vh - 25px)
                }

                .section-tabs .swiper-tabs-content .swiper-slide .row {
                    margin: 0 -5px
                }

                .section-tabs .swiper-tabs-content .swiper-slide .row .col-6,
                .section-tabs .swiper-tabs-content .swiper-slide .row .col {
                    padding: 0 5px
                }

                .section-tabs .swiper-tabs-content .swiper-slide .custom-select {
                    border-radius: 0
                }

                .section-tabs .swiper-tabs-content .swiper-slide textarea.form-control {
                    border-radius: 0;
                    background-color: #FFF
                }

                .section-tabs .swiper-tabs-content .swiper-slide .radio-courier .item-radio input ~ label {
                    border-radius: 0;
                    text-align: center
                }

                .section-tabs .swiper-tabs-content .swiper-slide .radio-courier .item-radio input ~ label h6 {
                    color: #b8026f
                }

                .section-tabs .swiper-tabs-content .swiper-slide .radio-courier .item-radio input ~ label p {
                    color: #989898
                }

                .section-tabs .swiper-tabs-content .swiper-slide .bottom {
                    margin-top: auto
                }

                .section-tabs .swiper-tabs-content .swiper-slide .bottom .btn {
                    text-transform: uppercase;
                    font-weight: 600;
                    font-family: 'Cairo', sans-serif !important;
                    position: relative
                }

                .section-tabs .swiper-tabs-content .swiper-slide .bottom .btn .icon {
                    position: absolute;
                    left: 15px;
                    top: 60%;
                    transform: translateY(-50%)
                }

                .section-tabs .swiper-tabs-content .swiper-slide .bottom .btn .icon img {
                    height: 20px;
                    width: auto;
                    filter: invert(1)
                }
            </style>
            <script src="{{ asset('/js/swiper.min.js') }}"></script>

            <script>
              swiperTabsNav = new Swiper('.swiper-tabs-nav', {
                spaceBetween: 0,
                slidesPerView: 2,
                loop: false,
                loopedSlides: 5,
                autoHeight: false,
                resistanceRatio: 0,
                watchOverflow: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true
              });

              // Swiper Content
              swiperTabsContent = new Swiper('.swiper-tabs-content', {
                spaceBetween: 0,
                loop: false,
                autoHeight: false,
                longSwipes: true,
                resistanceRatio: 0, // Disable First and Last Swiper
                watchOverflow: true,
                loopedSlides: 5,
                thumbs: {
                  swiper: swiperTabsNav
                }
              });
            </script>
            {{--SLIDER--}}
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
                 let camera = document.querySelector('.camera');
               let audio = document.getElementById("my-audio");

                function startup() {

                  video = document.getElementById('video');
                  canvas = document.getElementById('canvas');
                  photo = document.getElementById('output');
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
                    video.pause();
                    camera.classList.add('loading');
                    takepicture();
                  }, false);


                  clearphoto();
                }

                // Fill the photo with an indication that none has been
                // captured.

                function clearphoto() {
                  var context = canvas.getContext('2d');
                  context.fillStyle = "#000";
                  context.fillRect(0, 0, canvas.width, canvas.height);

                  var data = canvas.toDataURL('image/jpeg');
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
                    var data = canvas.toDataURL('image/jpeg');
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
                    camera.classList.remove('loading');
                    console.log('success!')
                    console.log(filename)
                  @this.set('data.photo', filename)
                    // console.log(@this.get('file'))
                  }, () => {
                    // Error callback.
                  }, (event) => {
                    console.log(event);
                    audio.play();
                    swiperTabsContent.slideNext()
                    video.play();
                    // Progress callback.
                    // event.detail.progress contains a number between 1 and 100 as the upload progresses.
                  });
                  }, 'image/jpeg');
                  // console.log($wire.__instance)
                  // $wire.set('photo', 'filename')
                }


                window.addEventListener('load', startup, false);
              })();
            </script>
        @endif
    </div>
</x-dynamic-component>

