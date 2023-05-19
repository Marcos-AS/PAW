class Carousel {

    constructor(pContenedor) {
        let contenedor = pContenedor.className
        ? pContenedor
        : document.querySelector(".sBusqueda");        
    
        if (contenedor) {

            //creamos container para el carrusel
            let carousel = PAW.nuevoElemento("section","", {
                class: "carousel"
            })

            //inserta antes de section .sBusqueda
            document.body.insertBefore(carousel,contenedor);

            //section para contener las imagenes
            let imgContainer = PAW.nuevoElemento("section","", {
                class: "carousel-images"
            })
            
            carousel.appendChild(imgContainer);

            //creamos thumbnail container
            let thumb = PAW.nuevoElemento("section","", {
                class: "thumbnails"
            })
            contenedor.appendChild(thumb);

            //creamos la barra de progreso
            let barraProgresoContainer = PAW.nuevoElemento("div", "", {
                class: "progress-bar"
            })

            let barraProgreso = PAW.nuevoElemento("div", "", {
                class: "progress-bar-fill"
            })

            barraProgresoContainer.appendChild(barraProgreso);

            //insertamos la barra de progreso despues de la section sBusqueda
            contenedor.insertAdjacentElement('afterend',barraProgreso);

            //crear elemento css

            let css = PAW.nuevoElemento("link", "", {
                rel: "stylesheet",
                href: "assets/scripts/components/styles/jsGenerated.css",
            });
            document.head.appendChild(css);


            //creamos botones
            let botonAtras = PAW.nuevoElemento("button", "<", {
                class: "carousel-prev-button",
                type: "button"
            });
            let botonAdelante = PAW.nuevoElemento("button", ">", {
                class: "carousel-next-button",
                type: "button"
            });

            //se agregan al section carousel
            carousel.prepend(botonAdelante);
            carousel.prepend(botonAtras);
            

            // LLAMADA Ejemplo de uso
            const images = [
            '/assets/imgs/1.jpg',
            '/assets/imgs/2.jpg',
            '/assets/imgs/3.jpg'
            ];
        
            loadCarousel('.sBusqueda', images, 'fade'); // Puedes especificar el efecto de transición deseado
        


            // Función para cargar imágenes y crear el carousel
            function loadCarousel(containerSelector, images, transitionEffect) {                
                agregarImagenes(images,imgContainer,"carousel-image");

                // Cargar imágenes y crear diapositivas
                function agregarImagenes(images,container,imgClass) {
                    images.forEach((imageUrl) => {
                        const image = new Image();
                        image.src = imageUrl;
                        if (imgClass !== "")
                            image.classList.add(imgClass);
                        //agrega al contenedor
                        container.appendChild(image);
                        /* para barra de progreso
                            image.onload = () => {
                            // Cálculo del porcentaje de carga de imágenes
                            const progress = Math.floor((loadedImagesCount / images.length) * 100);
                            progressBar.style.width = `${progress}%`;
                            if (loadedImagesCount === images.length) {
                                // Todas las imágenes se han cargado, iniciar el carousel
                                progressBar.style.width = '100%';
                                progressBar.addEventListener('transitionend', () => {
                                    // Comienza la animación del carousel
                                });
                            }
                        };*/
                    }); //end forEach
                }//end agregarImagenes
        
                //let loadedImagesCount = 0;


                //selecciona una imagen
                const image = imgContainer.querySelector('.carousel-image');    
        
                // Función para iniciar el carousel
                image.addEventListener('load', function startCarousel() {
                    
                    const imageWidth = image.naturalWidth; //ancho original de la imagen
                    console.log("el ancho de la imagen es: " + imageWidth);
                    const totalImages = imgContainer.children.length; //cantidad de imagenes (hijos del img container)
                    let index = 0; //indice de imagen actual
                
                    // Establecer el ancho del contenedor del carousel
                    imgContainer.style.width = `${imageWidth * totalImages}px`;
                    //carouselImages.style.transform = `translateX(${imageWidth}px)`
                
                    console.log("cantidad de imagenes es: " + totalImages)
                    console.log("ancho del container es: " + imgContainer.style.width);

                    console.log("el indice es: " + index);
                
                // Función para cambiar a la siguiente imagen
                    function nextSlide() {
                        if (index < totalImages - 1) {
                            index++;
                            // Calcular la posición de desplazamiento
                            const displacement = -imageWidth;

                            console.log("el indice es: " + index + ", el tamaño de la imagen es: " + imageWidth + " y el desplazamiento es de: " + displacement);
                        
                            // Aplicar la transición mediante la propiedad transform
                            imgContainer.style.transform = `translateX(${displacement}px)`;                        
                        }                
                    } //end nextSlide


                // Función para cambiar a la imagen anterior
                    function prevSlide() {
                        if (index > 0) {
                            index--;
                            // Calcular la posición de desplazamiento
                            const displacement = imageWidth;
                        
                            console.log("el indice es: " + index + ", el tamaño de la imagen es: " + imageWidth + " y el desplazamiento es de: " + displacement);
                        

                            // Aplicar la transición mediante la propiedad transform
                            imgContainer.style.transform = `translateX(${displacement}px)`;

                        }
                    
                    } //end prevSlide
                
                // Eventos para cambiar de imagen mediante las flechas izquierda y derecha
                    document.addEventListener('keydown', (event) => {
                        if (event.key === 'ArrowLeft') {
                            prevSlide();
                        } else if (event.key === 'ArrowRight') {
                            nextSlide();
                        }
                    });
                
                //Evento para cambiar de imagen al hacer clic en un botón "Siguiente"
                    const nextButton = document.querySelector('.carousel-next-button');                
                    nextButton.addEventListener('click', nextSlide);
                    
                //Evento para cambiar de imagen al hacer clic en un botón "Anterior"
                    const prevButton = document.querySelector('.carousel-prev-button');
                    prevButton.addEventListener('click', prevSlide);
                
                    // Ejemplo: Evento para cambiar de imagen al hacer clic en una miniatura
                    //agregamos el array de imgs al thumbnail container
                    /*agregarImagenes(images,thumb,"");
                    //selecciona todas las thumbnails
                    const thumbnailImages = thumb.querySelectorAll('img');
                    thumbnailImages.forEach((thumbnail) => {
                        thumbnail.addEventListener('click', () => {
                            thumbnailImages.forEach((thumb) => {
                                //quita clase active a todas las thumbnails
                                thumb.classList.remove('active'); 
                            })
                            //agrega la clase active a la thumbnail que se seleccionó
                            thumbnail.classList.add('active');

                            //obtiene el índice de la thumbnail seleccionada
                            const index = Array.from(thumbnailImages).indexOf(thumbnail);

                            const displacement = index * carouselImages.offsetWidth;
                            carouselImages.style.transform = `translateX(${displacement}px)`;
                    });
                    });*/

                })//end startCarousel

                } //end loadCarousel
        } //end if
  
} //end constructor
}
