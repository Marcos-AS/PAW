class medicosInterface {
    constructor() {
        this.fetchEspecialistas();
    }

    fetchEspecialistas() {
        fetch('assets/data/especialistas.json') //toma los datos de especialistas.JSON 
          .then(response => response.json())
          .then(data => {
            this.especialistas = data.especialistas; //guarda en array especialistas
//            console.log(this.especialistas);
            this.getTurnosDelDia('Lunes'); //por ejemplo
          });
    } //end fetchEspecialistas

    getTurnosDelDia(dia) {
        this.especialistas.forEach(esp => { //para cada esp en el array de especialistas
            //muestra el nombre de cada medico en el html
            let medico = esp.nombre + ' ' + esp.apellido;
            let title = document.createElement('h2');
            title.textContent = medico;
            document.body.appendChild(title);
            
            //muestra los turnos de cada uno
            let turnosTomados = esp.turnosTomados;
            //crea la lista
            let lista = document.body.appendChild(document.createElement('ul'));
            lista.classList.add('listaTurnos');

            turnosTomados.forEach(turno => { //para cada turno en el array de turnos
                if (turno.dia == dia) { //si coincide el dia param lo muestra en html
                    let item = document.createElement('li');
                    //if para que se vea con la cant correcta de ceros
                    if (turno.horas < 10) {
                        let hora = '0' + turno.horas;
                        if (turno.minutos == 0) {
                            console.log("hola");
                            let minutos = turno.minutos + '0';
                            item.textContent = hora + ':' + minutos;
                        } else {
                            item.textContent = hora + ':' + turno.minutos;
                        }
                    } else {
                        item.textContent = turno.horas + ':' + turno.minutos;
                    }
//                    console.log(item);
                    lista.appendChild(item);
                } //end if
            })//end turnosTomados.forEach
            if (lista.childElementCount === 0) {
                let item = document.createElement('li');
                item.textContent = 'No registra turnos para el día de hoy';
                lista.appendChild(item);
            }
        })
    }//end getTurnosDelDia

}