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
        //Inicializar la funcionalidad Carousell
		document.addEventListener("DOMContentLoaded", () => {
        PAW.cargarScript("Carousell", "assets/scripts/components/classCarousel.js", () => {
				let carousell = new Carousel(".sBusqueda");
			});
		});

        /* ---- Tabla de Estudios de un paciente ---- */ 

        //Cargar tabla con los datos
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
    }
}
let app = new appPAW();