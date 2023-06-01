class appPAW {
	constructor() {
        
        document.addEventListener("DOMContentLoaded", () => {

            //Inicializar la funcionalidad Menu
		    PAW.cargarScript("Hamburguesa", "../assets/scripts/components/hamburguesa.js", () => {	
                    new Hamburguesa();
			});

            //Inicializar la funcionalidad SubMenu
            PAW.cargarScript("Submenu", "../assets/scripts/components/submenu.js", () => {	
            });
            
            let contenedor = document.querySelector(".carousel");

            if (contenedor) {
                //Inicializar la funcionalidad Carousell (Punto 1)
                PAW.cargarScript("Carousell", "assets/scripts/components/classCarousel.js", () => {
                    const images = [
                        "/assets/imgs/1.jpg",
                        "/assets/imgs/2.jpg",
                        "/assets/imgs/3.jpg"
                    ];
                
                    new Carousel(".carousel", images);
                });
            }

            contenedor = document.querySelector("#fechaSelect");

            if (contenedor) {
                //Inicializar la funcionalidad de mostrar especialistas (Punto 2)
                PAW.cargarScript("Especialistas", "assets/scripts/components/especialistas.js", () => {
                        new Especialistas();
                });
            }

            contenedor = document.querySelector("#dropzone");

            if (contenedor) {
                //Inicializar la funcionalidad de DragAndDrop (Punto 3)
                PAW.cargarScript("DragDrop", "assets/scripts/components/dragdrop.js", () => {
                        new DragDrop("#dropzone");
                });
            }
            
            contenedor = document.querySelector("#tEstudios");

            if (contenedor) {
                //Inicializar las operaciones en la tabla
                PAW.cargarScript("Operaciones", "/assets/scripts/components/operacionesEstudios.js", () => {
                        new Operaciones("tEstudios");
                });
            }

            contenedor = document.querySelector(".userInterface");

            if (contenedor) {
                //Inicializar la interfaz de usuario
                PAW.cargarScript("Paciente", "assets/scripts/components/userInterface.js", () => {
                    new UserInterface();
                });
            }
            
            contenedor = document.querySelector(".medicoInterface");

            if (contenedor) {
                //Inicializar la interfaz de médicos
                PAW.cargarScript("Medico", "assets/scripts/components/medicosInterface.js", () => {
                    new medicosInterface();
                });
            }

            contenedor = document.querySelector(".salaEsperaContainer");

            if (contenedor) {
                //Inicializar la interfaz de la sala de espera
                PAW.cargarScript("Sala de Espera", "assets/scripts/components/salaEspera.js", () => {
                    new SalaEspera();
                });
            }

            contenedor = document.querySelector(".navAutoridades");
            if (contenedor) {
                //inicializar el nav de la sección autoridades
                PAW.cargarScript("Autoridades", "/../assets/scripts/components/autoridades.js", () => {
                    new Autoridades();
                })
            }
        });
    }
}
let app = new appPAW();