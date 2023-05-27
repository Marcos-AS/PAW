class Operaciones {
    constructor(pContenedor) {
        this.tabla = pContenedor.className ? pContenedor : document.querySelector("#tEstudios");  
    
        this.fetchEstudios();
    }

    // Cargar datos a traves de un JSON y ejecutar operaciones
    fetchEstudios() {
        fetch('/assets/data/datosEstudios.json')
            .then(response => response.json())
            .then(data => {
            this.estudios = data;
            this.insertarDatos();
            //Cargar estilos
            this.cargarStyles();
            //LLamado a funciones
            this.filtrarDatos();
            this.ordenar();
            this.paginar();
            this.resaltar();
        });
    }

    insertarDatos() {
      const tbody = document.querySelector('tbody');
    
      this.estudios.forEach(estudio => {
        const fila = tbody.insertRow();

        const celda1 = fila.insertCell();
        celda1.textContent = estudio.Medico;
    
        const celda2 = fila.insertCell();
        celda2.textContent = estudio.Motivo;
    
        const celda3 = fila.insertCell();
        celda3.textContent = estudio.Servicio;
    
        const celda4 = fila.insertCell();
        celda4.textContent = estudio.Fecha;
    
        const celda5 = fila.insertCell();
        celda5.textContent = estudio.Hora;
    
        const celda6 = fila.insertCell();
        celda6.textContent = estudio.Monto;
    
        const celda7 = fila.insertCell();
        celda7.textContent = estudio.Resultados;
      });    
    }    

    cargarStyles() {
        let css = PAW.nuevoElemento("link", "", {
            rel: "stylesheet",
            href: "/assets/scripts/components/styles/table.css",
        });
        document.head.appendChild(css);
    }
        

    /* ---- Filtrado de datos ---- */

    filtrarDatos() {
        const filtrosContainer = document.getElementById('fFilter');
        const table = document.getElementById('tEstudios');
        const rows = table.querySelectorAll('tbody tr');
      
        // Crear elementos de filtro
        const medicoFilter = crearSelectFiltro(rows, 0, 'medicoFilter', 'Médico');
        const motivoFilter = crearSelectFiltro(rows, 1, 'motivoFilter', 'Motivo');
        const servicioFilter = crearSelectFiltro(rows, 2, 'servicioFilter', 'Servicio');
      
        const botonFiltrar = document.createElement('button');
        botonFiltrar.type = 'button';
        botonFiltrar.textContent = 'Filtrar';
        botonFiltrar.addEventListener('click', filtrarTabla);
      
        // Agregar elementos al contenedor de filtros
        filtrosContainer.appendChild(document.createTextNode('Médico: '));
        filtrosContainer.appendChild(medicoFilter);
        filtrosContainer.appendChild(document.createTextNode('Motivo: '));
        filtrosContainer.appendChild(motivoFilter);
        filtrosContainer.appendChild(document.createTextNode('Servicio: '));
        filtrosContainer.appendChild(servicioFilter);
        filtrosContainer.appendChild(botonFiltrar);
      
        function crearSelectFiltro(rows, columnIndex, selectId, label) {
            const selectFilter = document.createElement('select');
            selectFilter.id = selectId;
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = `Todos los ${label}s`;
            selectFilter.appendChild(defaultOption);
        
            const values = new Set();
            for (let i = 0; i < rows.length; i++) {
                const cellValue = rows[i].querySelectorAll('td')[columnIndex].textContent;
                values.add(cellValue);
            }
        
            values.forEach((value) => {
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                selectFilter.appendChild(option);
            });
      
          return selectFilter;
        }
      
        function filtrarTabla() {
            const medico = document.getElementById('medicoFilter').value;
            const motivo = document.getElementById('motivoFilter').value;
            const servicio = document.getElementById('servicioFilter').value;
          
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const medicoValue = row.querySelectorAll('td')[0].textContent;
                const motivoValue = row.querySelectorAll('td')[1].textContent;
                const servicioValue = row.querySelectorAll('td')[2].textContent;
            
                const medicoValido = medico === '' || medico === medicoValue;
                const motivoValido = motivo === '' || motivo === motivoValue;
                const servicioValido = servicio === '' || servicio === servicioValue;
            
                if (medicoValido && motivoValido && servicioValido) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }          
    }
       

    /* ---- Ordenar filas de la tabla ---- */

    ordenar() {
        let isAscending = false;
        const table = document.getElementById('tEstudios');
        const headers = table.querySelectorAll('th');
        const rows = table.querySelectorAll('tbody tr');
    
        // Añadir evento click a los encabezados de columna
        headers.forEach(function(header, index) {
            header.addEventListener('click', function() {
                // Eliminar clases de ordenación de todas las columnas
                headers.forEach(function(header) {
                    header.classList.remove('asc');
                });
    
                // Obtener el índice de la columna correspondiente al encabezado en el que se hizo clic
                const columnIndex = index;
    
                // Ordenar las filas en función del valor de la columna
                const sortedRows = Array.from(rows).sort(function(rowA, rowB) {
                    const cellA = rowA.querySelectorAll('td')[columnIndex].innerText;
                    const cellB = rowB.querySelectorAll('td')[columnIndex].innerText;
    
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
                    table.querySelector('tbody').removeChild(row);
                });
    
                // Agregar las filas ordenadas a la tabla
                sortedRows.forEach(function(sortedRow) {
                    table.querySelector('tbody').appendChild(sortedRow);
                });
    
                // Cambiar la clase de ordenación de la columna actual
                header.classList.toggle('asc');
                isAscending = !isAscending;
            });
        });
    }
    

    /* ---- Paginacion de la tabla ---- */
    
    paginar() {
        //creamos container para la paginacion
        let contenedorPagination = PAW.nuevoElemento("div","", {
            id: "pagination"
        })
        
        //inserta despues de la tabla.
        this.tabla.insertAdjacentHTML('afterend',contenedorPagination.outerHTML);

        const itemsPerPage = 10; // Cantidad de elementos por página
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
    }

    /* ---- Resaltar Filas de la tabla ---- */

    resaltar() {
        let highlightedRow = null; // Almacenar la fila resaltada actualmente
        const rows = this.tabla.querySelectorAll('tbody tr');

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
