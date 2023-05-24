class DragDrop {
  constructor(dropzoneId) {
    this.dropzone = dropzoneId.tagName ? dropzoneId : document.querySelector(dropzoneId);
    console.log(this.dropzone);
    if (this.dropzone) {
      this.imageContainer = document.createElement('div');
      this.imageContainer.classList.add("imageContainer");
      this.messageContainer = document.createElement('p');
      this.messageContainer.classList.add("message");

      this.dropzone.insertAdjacentElement('afterend', this.imageContainer);
      this.dropzone.insertAdjacentElement('afterend', this.messageContainer);
      
      this.dropzone.addEventListener('dragenter', this.dragenter.bind(this));
      this.dropzone.addEventListener('dragover', this.dragover.bind(this));
      this.dropzone.addEventListener('dragleave', this.dragleave.bind(this));
      this.dropzone.addEventListener('drop', this.drop.bind(this));
    }
  }

  dragenter(e) {
    e.preventDefault();
    this.dropzone.classList.add('dragover');
  }

  dragover(e) {
    e.preventDefault();
  }

  dragleave(e) {
    this.dropzone.classList.remove('dragover');
  }

  drop(e) {
    e.preventDefault();
    this.dropzone.classList.remove('dragover');

    const files = e.dataTransfer.files;
    this.handleFiles(files);
  }

  handleFiles(files) {
    for (const file of files) {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = () => {
          const image = new Image();
          image.src = reader.result;
          image.style.width = '100px';
          image.style.height = '100px';
          this.imageContainer.appendChild(image);
          this.messageContainer.textContent = `Se cargó el archivo: ${file.name}`;
        };
        reader.readAsDataURL(file);
      }
    }
  }
}
