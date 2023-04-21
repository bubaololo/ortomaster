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

    /*#startbutton {*/
    /*    display: block;*/
    /*    position: relative;*/
    /*    margin-left: auto;*/
    /*    margin-right: auto;*/
    /*    bottom: 32px;*/
    /*    background-color: rgba(0, 150, 0, 0.5);*/
    /*    border: 1px solid rgba(255, 255, 255, 0.7);*/
    /*    box-shadow: 0px 0px 1px 2px rgba(0, 0, 0, 0.2);*/
    /*    font-size: 14px;*/
    /*    font-family: "Lucida Grande", "Arial", sans-serif;*/
    /*    color: rgba(255, 255, 255, 1.0);*/
    /*}*/

    .contentarea {
        font-size: 16px;
        font-family: "Lucida Grande", "Arial", sans-serif;
        width: 760px;
    }
</style>


<div class="container-md row py-5 mx-auto">
    {{ $this->form  }}
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
            <button class="btn btn-secondary" id="startbutton">Сделать снимок</button>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



<script>
  // Set the CSRF token for all AJAX requests
  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

  // // Get the video element and start the camera
  // var video = document.getElementById('video');
  // const constraints =  { "video": { width: { exact: 1920 }}};
  // navigator.mediaDevices.getUserMedia({ video })
  //     .then(function(stream) {
  //       video.srcObject = stream;
  //       video.onloadedmetadata = function(e) {
  //         video.play();
  //       };
  //     })
  //     .catch(function(err) {
  //       console.log(err.name + ": " + err.message);
  //     });
  //
  // // Get the canvas element and context
  // var canvas = document.getElementById('canvas');
  // var context = canvas.getContext('2d');
  //
  // // Add event listener to capture button
  // document.getElementById('capture').addEventListener('click', function() {
  //   // Set canvas dimensions to 1920 x 1080
  //   canvas.width = 1920;
  //   canvas.height = 1080;
  //
  //   // Draw the video onto the canvas
  //   context.drawImage(video, 0, 0, canvas.width, canvas.height);
  //
  //   // Convert canvas to data URL and display the image on the page
  //   var dataURL = canvas.toDataURL('image/png');
  //   var img = document.createElement('img');
  //   img.src = dataURL;
  //   document.body.appendChild(img);
  // });
  //
  // // Add event listener to save button
  // document.getElementById('save').addEventListener('click', function() {
  //   // Set canvas dimensions to 1920 x 1080
  //   canvas.width = 1920;
  //   // canvas.height = 1080;
  //
  //   // Draw the video onto the canvas
  //   context.drawImage(video, 0, 0, canvas.width, canvas.height);
  //
  //   // Convert canvas to data URL and send the image to the server
  //   var dataURL = canvas.toDataURL('image/png');
  //   axios.post('/photo', {
  //     image: dataURL,
  //     _token: csrfToken
  //   }).then(function(response) {
  //     console.log(response.data.url);
  //   }).catch(function(err) {
  //     console.log(err);
  //   });
  // });
</script>
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
    var startbutton = null;

    function startup() {
      video = document.getElementById('video');
      canvas = document.getElementById('canvas');
      photo = document.getElementById('photo');
      startbutton = document.getElementById('startbutton');

      navigator.mediaDevices.getUserMedia({video: true, audio: false})
          .then(function(stream) {
            video.srcObject = stream;
            video.play();
          })
          .catch(function(err) {
            console.log("An error occurred: " + err);
          });

      var deviceId;

      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
      });

      navigator.mediaDevices.enumerateDevices()
          .then(function(devices) {
            var cameras = devices.filter(function(device) {
              return device.kind === 'videoinput';
            });

            var cameraList = document.getElementById('cameraList');

            cameras.forEach(function(camera) {
              var option = document.createElement('a');
              option.classList.add('dropdown-item');
              option.textContent = camera.label;

              if(!camera.label) {
                option.textContent = camera.deviceId
              }

              option.setAttribute('data-device-id', camera.deviceId);

              option.addEventListener('click', function(event) {
                event.preventDefault();
                deviceId = camera.deviceId;
                cameraDropdown.querySelector('.dropdown-toggle').textContent = option.textContent;
              });

              cameraList.appendChild(option);
            });
          })
          .catch(function(err) {
            console.log(err.name + ": " + err.message);
          });

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

      startbutton.addEventListener('click', function(ev) {
        takepicture();
        ev.preventDefault();
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
    }

    // Add event listener to save button
    document.getElementById('save').addEventListener('click', function() {
      // Set canvas dimensions to 1920 x 1080
      // canvas.width = 1920;
      // canvas.height = 1080;

      // Draw the video onto the canvas
      // context.drawImage(video, 0, 0, canvas.width, canvas.height);

      // Convert canvas to data URL and send the image to the server
      var dataURL = canvas.toDataURL('image/png');
      axios.post('/photo', {
        image: dataURL,
        _token: csrfToken
      }).then(function(response) {
        console.log(response.data.url);
      }).catch(function(err) {
        console.log(err);
      });
    });
    // Set up our event listener to run the startup process
    // once loading is complete.
    window.addEventListener('load', startup, false);
  })();
</script>
