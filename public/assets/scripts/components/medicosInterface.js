class medicosInterface {
    constructor() {
        this.fetchEspecialistas()
        .then(() => {
            let day = new Date().getDay();
            this.getTurnosDelDia(this.day2Name(day)); //le pasa nombre del dia de hoy
            let titulo = document.querySelector('h1');
            titulo.textContent += ': ' + this.day2Name(day) + ' ' + day; //setea el h1
            this.seleccionarTurno();
            PAW.cargarStyles('assets/css/interfaces.css');
            
            //estado atendiendo, estado en espera
        })
    }

    fetchEspecialistas() {
        return fetch('assets/data/especialistas.json') //toma los datos de especialistas.JSON 
          .then(response => response.json())
          .then(data => {
            this.especialistas = data.especialistas; //guarda en array especialistas
          });
    } //end fetchEspecialistas

    getTurnosDelDia(dia) {
        //PAW.nuevoElemento('h1','Turnos');
        this.especialistas.forEach(esp => { //para cada esp en el array de especialistas
            //muestra el nombre de cada medico en el html
            let medico = esp.nombre + ' ' + esp.apellido;
            let title = document.createElement('h2');
            title.textContent = medico;
            document.body.appendChild(title);
            
            //muestra los turnos de cada uno
            let turnosTomados = esp.turnosTomados;
            //crea la lista
            let lista = PAW.nuevoElemento('ul','', {
                class: 'listaTurnos'
            })
            document.body.appendChild(lista);

            turnosTomados.forEach(turno => { //para cada turno en el array de turnos
                if (turno.dia == dia) { //si coincide el dia param lo muestra en html
                    let item = document.createElement('li');
                    //if para que se vea con la cant correcta de ceros
                    if (turno.horas < 10) {
                        let hora = '0' + turno.horas;
                        if (turno.minutos == 0) {
                            let minutos = turno.minutos.toString() + ' 0';
                            item.textContent = hora + ':' + minutos;
                        } else {
                            item.textContent = hora + ':' + turno.minutos;
                        }
                    } else {
                        item.textContent = turno.horas + ':' + turno.minutos;
                    }
                    lista.appendChild(item);
                } //end if
            })//end turnosTomados.forEach
            if (lista.childElementCount === 0) {
                let item = PAW.nuevoElemento('li','No registra turnos para el día de hoy', {
                    class: "sinTurnos"
                })
                lista.appendChild(item);
            }
        })
    }//end getTurnosDelDia

    seleccionarTurno() {
        let listas = document.querySelectorAll('.listaTurnos');
        listas.forEach(lista => {
            let items = lista.childElementCount;
            let item = lista.firstElementChild;
            for (let i=0; i<items; i++) {
                var boton = PAW.nuevoElemento('button','Atender',{
                    class: 'btnSeleccionarTurno'
                })
                item.insertAdjacentElement('afterend',boton);
                item = boton.nextElementSibling;
            }  
        })
    } //end seleccionarTurno

    day2Name(numDay) {
        switch (numDay) {
            case 1:
                return 'Lunes';
            case 2:
                return 'Martes';
            case 3:
                return 'Miércoles';
            case 4:
                return 'Jueves';
            case 5:
                return 'Viernes';
            case 6:
                return 'Sabado';
            case 7:
                return 'Domingo';
        }
    } //end day2Name

}