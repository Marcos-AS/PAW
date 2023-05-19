class Filter {

    constructor(pContenedor) {
        let contenedor = pContenedor.className
        ? pContenedor
        : document.querySelector(".tEstudios");        
    
        if (contenedor) {
            // Obtener referencias a elementos relevantes
            const tabla = document.getElementById(".tEstudios");
            const columnas = tabla.getElementsByTagName("th");
            const filas = tabla.getElementsByTagName("tr");

            //Crear botón "Ordenar"
            let sortButton = PAW.nuevoElemento("button", "Ordenar", {
                class: "sortButton",
                type: "button"
            });

            //Agregar botón de "Ordenar" en el formulario de filtrado
            let formularioFiltrado = document.getElementById('fFilter');
            formularioFiltrado.appendChild(sortButton);

            sortButton.addEventListener('click', function() {
                // Eliminar clases de ordenación de todas las columnas
                headers.forEach(function(header) {
                  header.classList.remove('asc');
                });

                // Función para ordenar la tabla según la columna seleccionada
                function ordenarTabla(columna) {
                    const tbody = tabla.getElementsByTagName("tbody")[0];
                    const filasArray = Array.from(filas).slice(1); // Ignorar la fila de encabezado
                
                    // Clasificar las filas según el valor de la columna seleccionada
                    filasArray.sort(function (filaA, filaB) {
                    const valorA = filaA.getElementsByTagName("td")[columna].textContent.trim();
                    const valorB = filaB.getElementsByTagName("td")[columna].textContent.trim();
                
                    // Realizar una comparación numérica si los valores son numéricos
                    if (!isNaN(valorA) && !isNaN(valorB)) {
                        return Number(valorA) - Number(valorB);
                    }
                
                    // Comparar como cadenas si no son numéricos
                    return valorA.localeCompare(valorB);
                    });
                
                    // Remover todas las filas existentes de la tabla
                    while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                    }
                
                    // Agregar las filas ordenadas a la tabla
                    filasArray.forEach(function (fila) {
                    tbody.appendChild(fila);
                    });
                }
                
                // Agregar evento de clic a las filas para resaltarlas
                for (let i = 0; i < filas.length; i++) {
                filas[i].addEventListener("click", function () {
                    this.classList.toggle("selected");
                });
                }

                // Implementa la funcionalidad de filtrado aquí

                // Implementa la funcionalidad de paginación aquí
            });
        }
    }   
}