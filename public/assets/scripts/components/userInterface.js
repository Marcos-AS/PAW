class UserInterface {
    constructor() {
      this.contenedor = document.querySelector(".userInterface");
      let css = PAW.nuevoElemento("link", "", {
        rel: "stylesheet",
        href: "/assets/scripts/components/styles/userInterface.css",
      });
      document.head.appendChild(css);
      if (this.contenedor) {
        this.actualizarDatosTurnos(); // Llamar a actualizarDatosTurnos una vez al iniciar
        setInterval(() => {
          this.actualizarDatosTurnos();
        }, 10000); // Actualizar los datos de los turnos cada 10 segundos
      }
    }

    actualizarDatosTurnos() {
        this.fetchInfoPaciente()
          .then(() => {
            // Verificar si cambió la información relevante para el usuario
            if (this.hayCambiosRelevantes()) {
              // Reproducir alerta sonora
              this.reproducirAlerta();
            }
            // Mostrar la información del paciente
            this.mostrarInfoPaciente();
          })
          .catch(error => {
            console.error('Error al obtener los datos:', error);
          });
      }

    fetchInfoPaciente() {
        return fetch('assets/data/infoPaciente.json')
          .then(response => response.json())
          .then(data => {
            this.pacientes = data.paciente;
          });
      }
    
    mostrarInfoPaciente() {
        this.contenedor.innerHTML = ''; // Limpiar el contenido existente
    
        let titulo = document.createElement('h1');
        titulo.textContent = "Hola " + this.pacientes.nombre;
        this.contenedor.appendChild(titulo);
        
        let turnoPaciente = document.createElement('p');
        turnoPaciente.textContent = "Tu turno es: " + this.pacientes.numeroTurno;
        this.contenedor.appendChild(turnoPaciente);

        let turnoActual = document.createElement('p');
        turnoActual.textContent = "Turno actual: " + this.pacientes.turnoEnAtencion;
        this.contenedor.appendChild(turnoActual);
    
        let tiempoEspera = document.createElement('p');
        tiempoEspera.textContent = "Tiempo de espera promedio: " + this.pacientes.tiempoEstimadoEspera;
        this.contenedor.appendChild(tiempoEspera);

        console.log(this.pacientes);
        }
    
    hayCambiosRelevantes() {
        const turnoActualElement = this.contenedor.querySelector('p:nth-child(3)');
        if (turnoActualElement) {
            const turnoActualActual = turnoActualElement.textContent;
            const nuevoTurnoActual = "Turno actual: " + this.pacientes.turnoEnAtencion;
            return turnoActualActual == nuevoTurnoActual;
        }
        return false; // El elemento no existe, no hay cambios relevantes
        }
        
          reproducirAlerta() {
            // Reproducir la alerta sonora, puedes usar el elemento de audio HTML5
            const audio = new Audio('/assets/data/SD_ALERT_27.mp3');
            audio.play();
          }

    }  