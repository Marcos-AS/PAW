class medicosInterface {
    constructor() {
        this.fetchEspecialistas()
        .then(() => {
            let day = this.day2Name(new Date().getDay());
            let date = new Date().getDate();
            this.getTurnosDelDia('Viernes'); //le pasa nombre del dia de hoy
            let titulo = document.querySelector('h1');
            titulo.textContent += ': ' + day + ' ' + date; //setea el h1
            this.botonesSeleccionarTurno();
            PAW.cargarStyles('assets/css/interfaces.css');

            //estado atendiendo, estado en espera
            //agrega evento click a los btns atender
            let btns = document.querySelectorAll(".btnSeleccionarTurno");
            btns.forEach(btn => {
                btn.addEventListener("click", this.seleccionarTurno);
            })

            //agrega evento click a los btns finalizar
            btns = document.querySelectorAll(".btnFinalizarTurno");
            btns.forEach(btn => {
                btn.addEventListener("click", this.finTurno);
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
        this.especialistas.forEach(esp => { //para cada esp en el array de especialistas
            //muestra el nombre de cada medico en el html
            let medico = esp.nombre + ' ' + esp.apellido + '. (Matrícula: ' + esp.matricula + ')';
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

    //agrega botones al lado del horario
    botonesSeleccionarTurno() {
        let listas = document.querySelectorAll('.listaTurnos');
        listas.forEach(lista => {
            let items = lista.childElementCount;
            let item = lista.firstElementChild;
            for (let i=0; i<items; i++) {
                //crea btn para marcar atender turno
                var btn = PAW.nuevoElemento('button','Atender',{
                    class: 'btnSeleccionarTurno'
                    //onclick: "this.seleccionarTurno()"
                })
                item.insertAdjacentElement('afterend',btn);

                //crea btn para marcar finalización turno
                let btnFin = PAW.nuevoElemento('button', 'Marcar fin', {
                    class: 'btnFinalizarTurno'
                });
                btnFin.disabled = true;
                btn.insertAdjacentElement('afterend',btnFin);
                item = btnFin.nextElementSibling;
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
                            
    //agrega un p que informa estado del turno al hacer clic en los btns
    seleccionarTurno(event) {
        let btn = event.currentTarget;
        btn.classList.remove('btnSeleccionarTurno');
        btn.disabled = true;
        btn.classList.add('btnAtendido');
        let estado = PAW.nuevoElemento('p', 'Estado: atendiendo', {
            class: 'turnoActivo'
        })

        let btnFin = btn.nextElementSibling;
        btnFin.insertAdjacentElement('afterend',estado); //agrega el estado (p)
        btnFin.disabled = false;        

        //deshabilitar los botones atender de todos los turnos
        let btns = btn.parentElement.querySelectorAll('.btnSeleccionarTurno');
        btns.forEach(iBtn => {
            iBtn.disabled = true;
        })

    }
    
    //evento del btn fin para cambiar el estado y tachar el horario
    finTurno(event) {
        let btnFin = event.target;
        btnFin.disabled = true; //deshabilita btn fin
        let item = btnFin.previousElementSibling.previousElementSibling;
        item.classList.add('turnoTachado'); //tacha el horario
        let estado = btnFin.nextElementSibling;
        estado.textContent = 'Estado: turno finalizado'; //cambia el estado

        //habilitar los botones atender de los demas turnos 
        let btns = btnFin.parentElement.querySelectorAll('.btnSeleccionarTurno');
        btns.forEach(iBtn => {
            iBtn.disabled = false;
        })
    }
}