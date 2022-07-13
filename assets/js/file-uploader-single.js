// Source = 'https://codepen.io/coderalexis/pen/JvgrxN'
// START OF ACQUIRED CODE
(function() {
  
    function FileUploader(selector) {
      if (undefined !== selector) {
        this.init(selector);
      }
    }
    
    FileUploader.prototype.init = function(selector) {
      if (undefined !== this.$el) {
        this.unsuscribe();
      }
      
      this.$el = document.querySelector(selector);
      this.$fileInput = this.$el.querySelector('input');
      this.$img = this.$el.querySelector('img');
      this.suscribe();
    }

    FileUploader.prototype.suscribe = function() {
      this.$fileInput.addEventListener('change', _handleInputChange.bind(this));
      this.$img.addEventListener('load', _handleImageLoaded.bind(this));
      this.$el.addEventListener('dragenter', _handleDragEnter.bind(this));
      this.$el.addEventListener('dragleave', _handleDragLeave.bind(this));
      this.$el.addEventListener('drop', _handleDrop.bind(this));
    }
    
    FileUploader.prototype.unsuscribe = function() {
      this.$fileInput.removeEventListener('change', _handleInputChange.bind(this));
      this.$img.removeEventListener('load', _handleImageLoaded.bind(this));
      this.$el.removeEventListener('dragenter', _handleDragEnter.bind(this));
      this.$el.removeEventListener('dragleave', _handleDragLeave.bind(this));
      this.$el.removeEventListener('drop', _handleDrop.bind(this));
    }

    function _handleDragEnter(e){
      e.preventDefault();

      if (!this.$el.classList.contains('dragging')) {
          this.$el.classList.add('dragging');
      }
    }

    function _handleDragLeave(e) {
      e.preventDefault();

      if (this.$el.classList.contains('dragging')) {
          this.$el.classList.remove('dragging');
      }
    }

    function _handleDrop(e) {
      e.preventDefault();
      this.$el.classList.remove('dragging');
      this.$img.files = e.dataTransfer.files;
      this.$fileInput.files = e.dataTransfer.files;
      _handleInputChange.call(this);
    }

    function _handleImageLoaded() {
      if (!this.$img.classList.contains('loaded')) {
          this.$img.classList.add('loaded');
      }
    }

    function _handleInputChange(e) {
      var file = (undefined !== e)
          ? e.target.files[0]
          : this.$img.files[0];

      var pattern = /image-*/;
      var reader = new FileReader();

      if (!file.type.match(pattern)) {
          alert('invalid format');
          return;
      }

      if (this.$el.classList.contains('loaded')) {
          this.$el.classList.remove('loaded');
      }

      reader.onload = _handleReaderLoaded.bind(this);
      reader.readAsDataURL(file);
    }

    function _handleReaderLoaded(e) {
      var reader = e.target;
      this.$img.src = reader.result;
      this.$el.classList.add('loaded');
    }
    
    window.FileUploader = FileUploader;
    
} ());

let singleCounter = 0;
$('.uploader-single').each((index, obj)=>{
  let newClass = 'uploader-single-' + singleCounter;
  obj.classList.add(newClass);
  new FileUploader('.' + newClass);
  singleCounter++;
});
// END OF ACQUIRED CODE

// Code to reset img src
var form = document.querySelector("form");
form.onreset = () => {
  // document.getElementById('gallery').innerHTML = "";
}