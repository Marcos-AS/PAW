class medicosInterface {
    constructor() {
        this.fetchEspecialistas()
        .then(() => {
            let day = this.day2Name(new Date().getDay());
            let date = new Date().getDate();
            this.getTurnosDelDia(day); //le pasa nombre del dia de hoy
            let titulo = document.querySelector('h1');
            titulo.textContent += ': ' + day + ' ' + date; //setea el h1
            this.botonesSeleccionarTurno();
            PAW.cargarStyles('assets/css/interfaces.css');

            //estado atendiendo, estado en espera
            let btns = document.querySelectorAll("button");
            btns.forEach(btn => {
                btn.addEventListener("click", this.seleccionarTurno);
            })
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
            let title = PAW.nuevoElemento('h2',medico,{});
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
                            let minutos = turno.minutos + '0';
                            item.textContent = hora + ':' + minutos;
                        } else {
                            item.textContent = hora + ':' + turno.minutos;
                        }
                    } else {
                        if (turno.minutos == 0) {
                            let minutos = turno.minutos + '0';
                            item.textContent = turno.horas + ':' + minutos;
                        } else {
                            item.textContent = turno.horas + ':' + turno.minutos;
                        }
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

    botonesSeleccionarTurno() {
        let listas = document.querySelectorAll('.listaTurnos');
        listas.forEach(lista => {
            let items = lista.childElementCount;
            let item = lista.firstElementChild;
            for (let i=0; i<items; i++) {
                var btn = PAW.nuevoElemento('button','Atender',{
                    class: 'btnSeleccionarTurno',
                    //onclick: "this.seleccionarTurno()"
                })
                //btn.onclick = this.seleccionarTurno;
                item.insertAdjacentElement('afterend',btn);
//                btn.addEventListener("click", this.seleccionarTurno(btn))
                item = btn.nextElementSibling;
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

    seleccionarTurno(event) {
        let btn = event.currentTarget;
        let estado = PAW.nuevoElemento('p', 'Estado: atendiendo', {
            class: 'turnoActivo'
        })
        btn.insertAdjacentElement('afterend',estado);
    }
}