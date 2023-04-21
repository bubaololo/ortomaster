export default {
  mounted() {
    this.$el.addEventListener('click', this.capture);
  },
  methods: {
    capture() {
      const video = document.createElement('video');
      const canvas = document.createElement('canvas');
      const context = canvas.getContext('2d');

      navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
        video.srcObject = stream;
        video.play();

        video.addEventListener('canplay', () => {
          const width = video.videoWidth;
          const height = video.videoHeight;

          canvas.width = width;
          canvas.height = height;

          context.drawImage(video, 0, 0, width, height);
          const dataUrl = canvas.toDataURL('image/jpeg');

          // send dataUrl to server via AJAX or set it as the value of a hidden input field in a form
        });
      });
    }
  }
}
