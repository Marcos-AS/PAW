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
        PAW.cargarScript("Carousell", "assets/scripts/components/classCarousell.js", () => {
				let carousell = new Carousell(".sBusqueda");
			});
		});
    }
}

let app = new appPAW();