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
    }
}
let app = new appPAW();