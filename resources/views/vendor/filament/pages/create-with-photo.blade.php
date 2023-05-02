<div>
    <style>
        #video {
            border: 1px solid black;
            box-shadow: 2px 2px 3px black;
            width: 320px;
            height: 240px;
        }

        #photo {
            border: 1px solid black;
            box-shadow: 2px 2px 3px black;
            width: 320px;
            height: 240px;
        }

        #canvas {
            display: none;
        }

        .camera {
            width: 340px;
            display: inline-block;
        }

        .output {
            width: 340px;
            display: inline-block;
        }

    </style>

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
        <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
            <!-- Interact with the `state` property in Alpine.js -->
            {{ $getStatePath() }}
            <input id="data.photo" name="photo"  type="file" wire:model.defer="{{ $getStatePath() }}" />
            {{--<input type="hidden" name="photo" wire:model="photo" />--}}
        </div>
    </x-dynamic-component>

    {{--<div x-data="fileUploadFormComponent({--}}
    {{--            acceptedFileTypes: null,--}}
    {{--            canDownload: false,--}}
    {{--            canOpen: false,--}}
    {{--            canPreview: true,--}}
    {{--            canReorder: false,--}}
    {{--            deleteUploadedFileUsing: async (fileKey) => {--}}
    {{--                return await $wire.deleteUploadedFile('data.photo', fileKey)--}}
    {{--            },--}}
    {{--            getUploadedFileUrlsUsing: async () => {--}}
    {{--                return await $wire.getUploadedFileUrls('data.photo')--}}
    {{--            },--}}
    {{--            imageCropAspectRatio: null,--}}
    {{--            imagePreviewHeight: null,--}}
    {{--            imageResizeMode: null,--}}
    {{--            imageResizeTargetHeight: null,--}}
    {{--            imageResizeTargetWidth: null,--}}
    {{--            imageResizeUpscale: true,--}}
    {{--            isAvatar: false,--}}
    {{--            loadingIndicatorPosition: 'right',--}}
    {{--            locale: 'ru',--}}
    {{--            panelAspectRatio: null,--}}
    {{--            panelLayout: 'compact',--}}
    {{--            placeholder: null,--}}
    {{--            maxSize: null,--}}
    {{--            minSize: null,--}}
    {{--            removeUploadedFileUsing: async (fileKey) => {--}}
    {{--                return await $wire.removeUploadedFile('data.photo', fileKey)--}}
    {{--            },--}}
    {{--            removeUploadedFileButtonPosition: 'left',--}}
    {{--            reorderUploadedFilesUsing: async (files) => {--}}
    {{--                return await $wire.reorderUploadedFiles('data.photo', files)--}}
    {{--            },--}}
    {{--            shouldAppendFiles: false,--}}
    {{--            shouldOrientImageFromExif: true,--}}
    {{--            shouldTransformImage: false,--}}
    {{--            state: $wire.entangle('data.photo').defer,--}}
    {{--            uploadButtonPosition: 'right',--}}
    {{--            uploadProgressIndicatorPosition: 'right',--}}
    {{--            uploadUsing: (fileKey, file, success, error, progress) => {--}}
    {{--                $wire.upload(`data.photo.${fileKey}`, file, () => {--}}
    {{--                    success(fileKey)--}}
    {{--                }, error, progress)--}}
    {{--            },--}}
    {{--        })" wire:ignore="" id="data.photo"  class="filament-forms-file-upload-component">--}}
    {{--        <input class="filepond--browser" type="file" id="filepond--browser-0ulzrured" aria-controls="filepond--assistant-0ulzrured" aria-labelledby="filepond--drop-label-0ulzrured" accept="">--}}


    {{--        <fieldset class="filepond--data"><input type="hidden" name="filepond" value="c37f52f5-8b15-4281-b468-dc0cbc0e54f2"></fieldset>--}}

    {{--    </div>--}}


    <div class="container-md row py-5 mx-auto">

        <div class="col-auto">
            <div class="dropdown my-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="cameraDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Выберите камеру
                </button>
                <div class="dropdown-menu" aria-labelledby="cameraDropdown" id="cameraList">
                </div>
            </div>

            <div class="col-md-6">
                <div class="camera">
                    <video id="video">Видео недоступно</video>
                    <div class="btn btn-secondary" id="snap">Сделать снимок</div>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-secondary" id="save">Сохранить снимок</button>
                <canvas id="canvas">
                </canvas>
                <div class="output">
                    <img id="photo" alt="The screen capture will appear in this box.">
                </div>
            </div>
        </div>
    </div>
    {{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>--}}

    {{--<script>--}}
    {{--  // Set the CSRF token for all AJAX requests--}}
    {{--  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}
    {{--  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;--}}

    {{--</script>--}}
    <script>

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

          navigator.mediaDevices.getUserMedia({video: true, audio: false})
              .then(function(stream) {
                video.srcObject = stream;
                video.play();
              })
              .catch(function(err) {
                console.log("An error occurred: " + err);
              });

          var deviceId;

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

          navigator.mediaDevices.getUserMedia({video: {deviceId: deviceId, width: {exact: 1920}, height: {exact: 0}}})
              .then(function(stream) {
                var video = document.getElementById('video');
                video.srcObject = stream;
                video.onloadedmetadata = function(e) {
                  video.play();
                };
              })
              .catch(function(err) {
                console.log(err.name + ": " + err.message);
              });


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

        // Add event listener to save button
        // document.getElementById('save').addEventListener('click', function() {
        //    var dataURL = canvas.toDataURL('image/png');
        //    axios.post('/photo', {
        //       image: dataURL,
        //       _token: csrfToken
        //    }).then(function(response) {
        //       console.log(response.data.url);
        //    }).catch(function(err) {
        //       console.log(err);
        //    });
        // });
        // document.getElementById('save').addEventListener('click', function() {
        //
        //   // Convert canvas to data URL and send the image to the server
        //   var dataURL = canvas.toDataURL('image/png');
        //
        //   // fetch('/photo', {
        //   fetch('http://filament.loc/livewire/message/app.filament.resources.patient-resource.pages.create-patient', {
        //     method: 'POST',
        //     headers: {
        //       'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify({
        //       image: dataURL,
        //       _token: csrfToken
        //     })
        //   })
        //       .then(function(response) {
        //         if (!response.ok) {
        //           throw new Error('Network response was not ok');
        //         }
        //         return response.json();
        //       })
        //       .then(function(data) {
        //         console.log(data.url);
        //       })
        //       .catch(function(err) {
        //         console.log(err);
        //       });
        // });
        // Set up our event listener to run the startup process
        // once loading is complete.
        window.addEventListener('load', startup, false);
      })();
    </script>
</div>