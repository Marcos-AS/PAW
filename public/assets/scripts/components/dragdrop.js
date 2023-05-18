// Obtén una referencia al elemento dropzone
const dropzone = document.getElementById('dropzone');

// Agrega los eventos de escucha para el drag and drop
dropzone.addEventListener('dragenter', dragenter);
dropzone.addEventListener('dragover', dragover);
dropzone.addEventListener('dragleave', dragleave);
dropzone.addEventListener('drop', drop);

function dragenter(e) {
  e.preventDefault();
  dropzone.classList.add('dragover');
}

function dragover(e) {
  e.preventDefault();
}

function dragleave(e) {
  dropzone.classList.remove('dragover');
}

function drop(e) {
  e.preventDefault();
  dropzone.classList.remove('dragover');

  const files = e.dataTransfer.files;
  handleFiles(files);
}

function handleFiles(files) {
  for (const file of files) {
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function () {
        // Aquí puedes realizar las acciones necesarias con la imagen, como mostrarla en el formulario de turnos, enviarla al servidor, etc.
        const image = new Image();
        image.src = reader.result;
        image.style.width = '100px'; // Establecer un ancho específico
        image.style.height = '100px';
        imageContainer.appendChild(image);
        message.textContent = `Se cargó el archivo: ${file.name}`;
      };
      reader.readAsDataURL(file);
    }
  }
}
