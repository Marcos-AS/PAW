class userInterface {

    constructor() {
        this.fetchInfoPaciente();
    }

    mostrarInfoPaciente() {
        let titulo = document.createElement('h1');
        let text = document.createTextNode("Hola " + this.pacientes.nombre);
        titulo.appendChild(text);
        document.body.appendChild(titulo);

        let turno = document.createElement('p');
        text = document.createTextNode("Tu número de turno es " + this.pacientes.numeroTurno);
        turno.appendChild(text);
        document.body.appendChild(turno);
    }

    fetchInfoPaciente() {
        fetch('assets/data/infoPaciente.json')
          .then(response => response.json())
          .then(data => {
            this.pacientes = data.paciente;
//            console.log(this.pacientes);
            this.mostrarInfoPaciente();
          });
        
      }
}




  