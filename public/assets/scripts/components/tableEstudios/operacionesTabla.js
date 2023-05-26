class OpTabla {
    constructor(pContenedor) {
        let contenedor = pContenedor.className
        ? pContenedor
        : document.querySelector("#tEstudios");        
        
        console.log(contenedor);
        if (contenedor) {  
            this.fetchEstudios();      
            console.log("Tabla: " + contenedor);
            const headers = contenedor.querySelectorAll('th');
            console.log("Headers: " + headers.length);
            const rows = document.getElementsByTagName('tr');
            console.log("Filas " + rows.length);

           /* let css = PAW.nuevoElemento("link", "", {
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
           /* cargarFiltros();

            const especialidadFilter = document.getElementById('especialidadFilter');
            const doctorFilter = document.getElementById('doctorFilter');

            especialidadFilter.addEventListener('change', filtrarTabla);
            doctorFilter.addEventListener('change', filtrarTabla); */

            function filtrarTabla() {
                const especialidad = especialidadFilter.value;
                const doctor = doctorFilter.value;

                for (let i = 1; i < contenedor.rows.length; i++) {
                    const row = contenedor.rows[i];
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

           // let isAscending = false;

            // Añadir evento click a los encabezados de columna
           /* headers.forEach(function(header, index) {
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
                        contenedor.querySelector('tbody').removeChild(row);
                    });
                
                    // Agregar las filas ordenadas a la tabla
                    sortedRows.forEach(function(sortedRow) {
                        contenedor.querySelector('tbody').appendChild(sortedRow);
                    });
                
                    // Cambiar la clase de ordenación de la columna actual
                    headers[0].classList.toggle('asc');
                    isAscending = !isAscending;
                });
            });


            /* ------------------------------------ */


            /* ---- Paginacion de la tabla ---- */
            
            //creamos container para la paginacion
         /*   let contenedorPagination = PAW.nuevoElemento("div","", {
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

        }
    }

    fetchEstudios() {
        fetch('/assets/scripts/components/tableEstudios/tabla.json')
          .then(response => response.json())
          .then(data => {
            this.estudios = data;
            console.log(this.estudios);
            this.insertarDatos();
            const contenedor = document.querySelector("#tEstudios");
            console.log("Tabla: " + contenedor);
            const headers = contenedor.querySelectorAll('th');
            console.log("Headers: " + headers.length);
            const rows = contenedor.querySelectorAll('tbody tr');
            console.log("Filas: " + rows.length);

            // Escuchar eventos de clic en las filas para resaltar la fila
            rows.forEach((row) => {
                row.addEventListener('click', () => {
                    highlightRow(row);
                });
            });

          });
      }

        // Función para resaltar una fila
        highlightRow(row) {
        let highlightedRow = null; // Almacenar la fila resaltada actualmente
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
  
      insertarDatos() {
        const contenedor = document.querySelector("#tEstudios");
        let tbody = contenedor.querySelector('tbody');
        
        if (!tbody) {
          tbody = document.createElement('tbody');
          contenedor.appendChild(tbody);
        }

        this.estudios.forEach(estudio => {
          const fila = document.createElement('tr');
      
          const celda1 = document.createElement('td');
          celda1.textContent = estudio.Fecha;
          fila.appendChild(celda1);
      
          const celda2 = document.createElement('td');
          celda2.textContent = estudio.Hora;
          fila.appendChild(celda2);
      
          const celda3 = document.createElement('td');
          celda3.textContent = estudio.Medico;
          fila.appendChild(celda3);
      
          const celda4 = document.createElement('td');
          celda4.textContent = estudio.Motivo;
          fila.appendChild(celda4);
      
          const celda5 = document.createElement('td');
          celda5.textContent = estudio.Servicio;
          fila.appendChild(celda5);
      
          const celda6 = document.createElement('td');
          celda6.textContent = estudio.Monto;
          fila.appendChild(celda6);
      
          const celda7 = document.createElement('td');
          celda7.textContent = estudio.Resultados;
          fila.appendChild(celda7);
      
          tbody.appendChild(fila); 
    })
    console.log(tbody);
}
}
