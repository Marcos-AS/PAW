class OpTabla {
    constructor(pContenedor) {
        let contenedor = pContenedor.className
        ? pContenedor
        : document.querySelector("#tEstudios");        
        
        console.log(contenedor);
        if (contenedor) {        
            const tabla = document.getElementById('tEstudios');
            const headers = tabla.querySelectorAll('th');
            const rows = tabla.querySelectorAll('tbody tr');

            let css = PAW.nuevoElemento("link", "", {
                rel: "stylesheet",
                href: "/assets/scripts/components/styles/table.css",
            });
            document.head.appendChild(css);


            /* ------------------------------------ */


            /* ---- Filtrado de datos ---- */
            
             // Cargar opciones de filtro desde los datos
            function cargarFiltros() {
                const filtrosContainer = document.getElementById('fFilter');

                const especialidadFilter = document.createElement('select');
                especialidadFilter.id = 'especialidadFilter';
                const especialidadDefaultOption = document.createElement('option');
                especialidadDefaultOption.value = '';
                especialidadDefaultOption.textContent = 'Todas las especialidades';
                especialidadFilter.appendChild(especialidadDefaultOption);

                const doctorFilter = document.createElement('select');
                doctorFilter.id = 'doctorFilter';
                const doctorDefaultOption = document.createElement('option');
                doctorDefaultOption.value = '';
                doctorDefaultOption.textContent = 'Todos los doctores';
                doctorFilter.appendChild(doctorDefaultOption);

                /* Creamos el boton de filtrado */
                let boton = PAW.nuevoElemento("button", "Filtrar", {
                    type: "button"
                });
                
                filtrosContainer.appendChild(document.createTextNode('Especialidad: '));
                filtrosContainer.appendChild(especialidadFilter);
                filtrosContainer.appendChild(document.createTextNode('Doctor: '));
                filtrosContainer.appendChild(doctorFilter);
                filtrosContainer.appendChild(boton);
            }
            cargarFiltros();

            const especialidadFilter = document.getElementById('especialidadFilter');
            const doctorFilter = document.getElementById('doctorFilter');

            especialidadFilter.addEventListener('change', filtrarTabla);
            doctorFilter.addEventListener('change', filtrarTabla);

            function filtrarTabla() {
                const especialidad = especialidadFilter.value;
                const doctor = doctorFilter.value;

                for (let i = 1; i < tabla.rows.length; i++) {
                    const row = tabla.rows[i];
                    const especialidadValue = row.cells[0].textContent;
                    const doctorValue = row.cells[1].textContent;

                    if ((especialidad === '' || especialidad === especialidadValue) &&
                        (doctor === '' || doctor === doctorValue)) {
                            row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }


            /* ------------------------------------ */

            
            /* ---- Ordenar filas de la tabla ---- */

            let isAscending = false;

            // Añadir evento click a los encabezados de columna
            headers.forEach(function(header, index) {
                header.addEventListener('click', function() {
                    // Eliminar clases de ordenación de todas las columnas
                    headers.forEach(function(header) {
                        header.classList.remove('asc');
                    });

                    // Ordenar las filas en función del valor de la columna
                    const sortedRows = Array.from(rows).sort(function(rowA, rowB) {
                    const cellA = rowA.querySelectorAll('td')[0].innerText;
                    const cellB = rowB.querySelectorAll('td')[0].innerText;
                
                    if (isAscending) {
                        return cellA > cellB ? -1 : 1;
                    } else {
                        return cellA > cellB ? 1 : -1;
                    }
                    });
                
                    // Crear un nuevo array de filas a eliminar
                    const rowsToRemove = Array.from(rows);
                
                    // Eliminar las filas del nuevo array
                    rowsToRemove.forEach(function(row) {
                    tabla.querySelector('tbody').removeChild(row);
                    });
                
                    // Agregar las filas ordenadas a la tabla
                    sortedRows.forEach(function(sortedRow) {
                    tabla.querySelector('tbody').appendChild(sortedRow);
                    });
                
                    // Cambiar la clase de ordenación de la columna actual
                    headers[0].classList.toggle('asc');
                    isAscending = !isAscending;
                });
            });


            /* ------------------------------------ */


            /* ---- Paginacion de la tabla ---- */
            
            //creamos container para la paginacion
            let contenedorPagination = PAW.nuevoElemento("div","", {
                id: "pagination"
            })
            
            //inserta antes de la table.
            contenedor.insertAdjacentHTML('afterend',contenedorPagination.outerHTML);

            const itemsPerPage = 5; // Cantidad de elementos por página
            let currentPage = 1; // Página actual

            function displayTable(page) {
                const tableBody = document.querySelector('tbody');
                const rows = tableBody.getElementsByTagName('tr');

                // Ocultar todas las filas de la tabla
                for (let i = 0; i < rows.length; i++) {
                    rows[i].style.display = 'none';
                }

                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;

                // Mostrar solo las filas correspondientes a la página actual
                for (let i = startIndex; i < endIndex && i < rows.length; i++) {
                    rows[i].style.display = 'table-row';
                }
            }

            function displayPagination() {
                const tableBody = document.querySelector('tbody');
                const totalRows = tableBody.getElementsByTagName('tr').length;
                const totalPages = Math.ceil(totalRows / itemsPerPage);
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = ''; // Limpiar contenido de la paginación

                for (let i = 1; i <= totalPages; i++) {
                    const pageLink = document.createElement('a');
                    pageLink.href = '#';
                    pageLink.textContent = i;

                    if (i === currentPage) {
                        pageLink.classList.add('active');
                    }

                    pageLink.addEventListener('click', function () {
                        currentPage = i;
                        displayTable(currentPage);
                        displayPagination();
                    });
                    pagination.appendChild(pageLink);
                }
            }
            // Mostrar la tabla y la paginación inicial
            displayTable(currentPage);
            displayPagination();



            /* ------------------------------------ */



            /* ---- Resaltar Filas de la tabla ---- */

            let highlightedRow = null; // Almacenar la fila resaltada actualmente

            // Función para resaltar una fila
            function highlightRow(row) {
                if (highlightedRow) {
                    highlightedRow.classList.remove('highlighted');
                }

                if (highlightedRow !== row) {
                    row.classList.add('highlighted');
                    highlightedRow = row;
                } else {
                    highlightedRow = null;
                }
            }

            // Escuchar eventos de clic en las filas para resaltar la fila
            rows.forEach((row) => {
                row.addEventListener('click', () => {
                    highlightRow(row);
                });
            });
        }
    }
}
