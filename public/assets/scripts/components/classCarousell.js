class Carousell {

    constructor(pContenedor) {
        let contenedor = pContenedor.className
        ? pContenedor
        : document.querySelector(".sBusqueda");        
    
        if (contenedor) {

            //creamos container para las imagenes dentro de .sBusqueda
            let imgContainer = PAW.nuevoElemento("section","", {
                class: "carousel-images"
            })

            contenedor.prepend(imgContainer);

            //creamos la barra de progreso
            let barraProgreso = PAW.nuevoElemento("div", "", {
                class: "progress-bar"
            })

            let barraProgreso1 = PAW.nuevoElemento("div", "", {
                class: "progress-bar-fill"
            })

            barraProgreso.appendChild(barraProgreso1);

            //insertamos la barra de progreso despues de la section sBusqueda
            contenedor.insertAdjacentElement('afterend',barraProgreso);

            //crear elemento css

            let css = PAW.nuevoElemento("link", "", {
                rel: "stylesheet",
                href: "assets/scripts/components/styles/jsGenerated.css",
            });
            document.head.appendChild(css);


            //creamos botones
            let botonAtras = PAW.nuevoElemento("button", "Atrás", {
                class: "carousel-prev-button",
                type: "button"
            });
            let botonAdelante = PAW.nuevoElemento("button", "Adelante", {
                class: "carousel-next-button",
                type: "button"
            });

            contenedor.prepend(botonAdelante);
            contenedor.prepend(botonAtras);
            

            // LLAMADA Ejemplo de uso
            const images = [
            '/assets/imgs/1.jpg',
            '/assets/imgs/2.jpg',
            '/assets/imgs/3.jpg'
            ];
        
            loadCarousel('.sBusqueda', images, 'fade'); // Puedes especificar el efecto de transición deseado
        


            // Función para cargar imágenes y crear el carousel
            function loadCarousel(containerSelector, images, transitionEffect) {
                const container = document.querySelector(containerSelector);
                const carouselImages = container.querySelector('.carousel-images');
                const progressBar = document.querySelector('.progress-bar-fill');
        
                // Cargar imágenes y crear diapositivas
                images.forEach((imageUrl) => {
                    const image = new Image();
                    image.src = imageUrl;
                    image.classList.add("carousel-image");
    
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
            
                    //agrega al contenedor
                    carouselImages.appendChild(image);
                }); //end forEach
        
                //let loadedImagesCount = 0;

                //selecciona una imagen
                const image = carouselImages.querySelector('.carousel-image');
        
                // Función para iniciar el carousel
                image.addEventListener('load', function startCarousel() {
                    const container = document.querySelector('.sBusqueda');
                    const carouselImages = container.querySelector('.carousel-images');
                    const imageWidth = image.clientWidth;
                    console.log("el ancho de la imagen es: " + imageWidth);
                    const totalImages = carouselImages.children.length; //cantidad de imagenes (hijos del img container)
                    let index = 0; //indice de imagen actual
                
                    // Establecer el ancho del contenedor del carousel
                    carouselImages.style.width = `${imageWidth * totalImages}px`;
                    carouselImages.style.transform = `translateX(${imageWidth}px)`
                
                    console.log("cantidad de imagenes es: " + totalImages)
                    console.log("ancho del container es: " + carouselImages.style.width);

                    console.log("el indice es: " + index);
                
                // Función para cambiar a la siguiente imagen
                    function nextSlide() {
                        if (index < totalImages - 1) {
                            index++;
                            // Calcular la posición de desplazamiento
                            const displacement = -imageWidth;

                            console.log("el indice es: " + index + ", el tamaño de la imagen es: " + imageWidth + " y el desplazamiento es de: " + displacement);
                        
                            // Aplicar la transición mediante la propiedad transform
                            carouselImages.style.transform = `translateX(${displacement}px)`;                        
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
                            carouselImages.style.transform = `translateX(${displacement}px)`;

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
                    /*const thumbnails = document.querySelectorAll('.carousel-thumbnail');
                    thumbnails.forEach((thumbnail, index) => {
                    thumbnail.addEventListener('click', () => {
                        index = index;
                        const displacement = -index * imageWidth;
                        carouselImages.style.transform = `translateX(${displacement}px)`;
                    });
                    });*/

                })//end startCarousel

                } //end loadCarousel
        } //end if
  
} //end constructor
}
