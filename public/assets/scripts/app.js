class appPAW {
	constructor() {
        //Inicializar la funcionalidad Menu
        document.addEventListener("DOMContentLoaded", () => {
		PAW.cargarScript("PAW-Menu", "assets/scripts/components/hamburguesa.js", () => {	
			});
		}
        );
        //Inicializar la funcionalidad SubMenu
        document.addEventListener("DOMContentLoaded", () => {
        PAW.cargarScript("PAW-Menu", "assets/scripts/components/submenu.js", () => {	
            });
        }
        );
        //Inicializar la funcionalidad Carousell (Punto 1)
		document.addEventListener("DOMContentLoaded", () => {
        PAW.cargarScript("Carousell", "assets/scripts/components/classCarousel.js", () => {
                const images = [
                    "/assets/imgs/1.jpg",
                    "/assets/imgs/2.jpg",
                    "/assets/imgs/3.jpg"
                ];
              
                const carousel = new Carousel(".carousel", images);
			});
		});
        //Inicializar la funcionalidad de mostrar especialistas (Punto 2)
		document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("Especialistas", "assets/scripts/components/especialistas.js", () => {
                    let especialistas = new Especialistas();
            });
        });
        //Inicializar la funcionalidad de DragAndDrop (Punto 3)
		document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("DragDrop", "assets/scripts/components/dragdrop.js", () => {
                    let dragdrop = new DragDrop("#dropzone");
            });
        });

        // Tabla de estudios de un paciente
        
         //Cargar los datos en la tabla.
		document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("Estudios", "../assets/scripts/components/tableEstudios/cargarJson.js", () => {
                    let estudios = new Estudios();
            });
        }); 

        //Inicializar las operaciones en la tabla
		document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("OpTabla", "../assets/scripts/components/tableEstudios/operacionesTabla.js", () => {
                    let opTabla = new OpTabla("tEstudios");
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("Paciente", "assets/scripts/components/userInterface.js", () => {
                let infoPaciente = new userInterface();
            })
        })

        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("Medico", "assets/scripts/components/medicosInterface.js", () => {
                let infoMedicos = new medicosInterface();
            })
        })
    }
}
let app = new appPAW();