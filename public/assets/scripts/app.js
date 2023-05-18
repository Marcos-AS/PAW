class appPAW {
	constructor() {
        //Inicializar la funcionalidad Menu
        document.addEventListener("DOMContentLoaded", () => {
		PAW.cargarScript("Menu-Hamburguesa", "/assets/scripts/components/hamburguesa.js", () => {	
				// let menu = new PAWMenu("nav");
			});
		}
        );
        //Inicializar la funcionalidad SubMenu
        document.addEventListener("DOMContentLoaded", () => {
        PAW.cargarScript("SubMenu", "/assets/scripts/components/submenu.js", () => {	
                //let menu = new PAWMenu("nav");
            });
        }
        );
        //Inicializar la funcionalidad Carousell
		document.addEventListener("DOMContentLoaded", () => {
        PAW.cargarScript("Carousell", "assets/scripts/components/carousell.js", () => {
				let carousell = new Carousell();
			});
		});
    }
}
let app = new appPAW();