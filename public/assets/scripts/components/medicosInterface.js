class medicosInterface {
    constructor() {
        this.fetchEspecialistas();
    }

    fetchEspecialistas() {
        fetch('assets/data/especialistas.json')
          .then(response => response.json())
          .then(data => {
            this.especialistas = data.especialistas;
            console.log(this.especialistas);
            this.getTurnosDelDia('Lunes'); //por ejemplo
          });
    } //end fetchEspecialistas

    getTurnosDelDia(dia) {
        let turnosTomados = this.especialistas.turnosTomados;
        console.log(turnosTomados);
        this.turnosTomados.forEach(turno => {
            if (turno.turnosTomados.turno.dia == dia) {
                this.mostrarTurnosDelDia(turnosTomados[turno]);  
              }  
        })
    }

    //crea las html tags para mostrar
    mostrarTurnosDelDia(dia) {
        let lista = document.createElement('ul');
        let item = document.createElement('li');
        let fechaHoraTurno = document.createTextNode(dia.horas + ':' + dia.minutos);
        document.body.appendChild(lista.appendChild(item.appendChild(fechaHoraTurno)));
    }
}