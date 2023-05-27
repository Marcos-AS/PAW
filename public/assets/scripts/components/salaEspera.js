    class SalaEspera {

        constructor() {
        // Crear el elemento <link>
        let css = PAW.nuevoElemento("link", "", {
            rel: "stylesheet",
            href: "/assets/scripts/components/styles/salaEspera.css",
        });

        // Agregar el elemento <link> al documento HTML
        document.head.appendChild(css);
        this.initTurnos();

        setInterval(() => {
            this.initTurnos();
        }, 10000);
        } 

        initTurnos() {
        fetch('assets/data/turnos.json')
        .then(response => response.json())
        .then(data => {
            this.turnos = data.turnos;
            console.log(this.turnos);
                   
            // Obtener el contenedor
            var contenedorSalaEspera = document.getElementsByClassName("salaEsperaContainer")[0];

            // Eliminar los elementos existentes del contenedor
            while (contenedorSalaEspera.firstChild) {
                contenedorSalaEspera.removeChild(contenedorSalaEspera.firstChild);
            }

            console.log(contenedorSalaEspera);

            // Función para reproducir la alerta sonora
            function reproducirAlertaSonora() {
                var AudioContext = window.AudioContext || window.webkitAudioContext;
                var audioContext = new AudioContext();
    
            var oscillator = audioContext.createOscillator();
            oscillator.type = "square";
            oscillator.frequency.value = 500; // Frecuencia del tono
    
            oscillator.connect(audioContext.destination);
    
            oscillator.start();
    
            setTimeout(function() {
            oscillator.stop();
            oscillator.disconnect();
            }, 500); // Duración de la alerta en milisegundos
        }
    
            // Iterar sobre los turnos y agregarlos al contenedor
            this.turnos.forEach(function(turno) {
            var turnoCard = document.createElement("ul");
            turnoCard.className = "turnoCard";

            var turnoElemento = document.createElement("li");
            turnoElemento.className = "turno";
            turnoElemento.innerHTML = "Número de Turno: " + turno.numero;
            turnoCard.appendChild(turnoElemento);

            var pacienteElemento = document.createElement("li");
            pacienteElemento.className = "paciente";
            pacienteElemento.innerHTML = "Paciente: " + turno.paciente;
            turnoCard.appendChild(pacienteElemento);

            var horaLlegadaElemento = document.createElement("li");
            horaLlegadaElemento.innerHTML = "Hora de Llegada: " + turno.horaLlegada;
            horaLlegadaElemento.className = "horaLlegada";
            turnoCard.appendChild(horaLlegadaElemento);

            var estadoElemento = document.createElement("li");
            estadoElemento.className = "estado";
            estadoElemento.innerHTML = "Estado: " + turno.estado;
            turnoCard.appendChild(estadoElemento);

            contenedorSalaEspera.appendChild(turnoCard);

            // Verificar si el turno está en espera y reproducir la alerta sonora
            if (turno.estado === "En espera") {
                reproducirAlertaSonora();
            }
            });
        }); 
        }
    }
    