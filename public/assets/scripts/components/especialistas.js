fetch('assets/data/especialistas.json')
  .then(response => response.json())
  .then(data => {
    var especialistas = data.especialistas;
    console.log(especialistas);
    
    // Obtener el elemento select del formulario
    var selectMedico = document.getElementById('selectProfesionales');

    var optionInicial = document.createElement('option');
    optionInicial.value = '';
    optionInicial.textContent = 'Ingrese un profesional';
    selectMedico.appendChild(optionInicial);

    // Generar las opciones del select a partir de los datos del JSON
    especialistas.forEach(medico => {
    var option = document.createElement('option');
    option.value = medico.matricula;
    option.textContent = medico.nombre + ' ' + medico.apellido;
    selectMedico.appendChild(option);
    });

    selectMedico.addEventListener('change', function() {
    var selectedMedico = this.value;
    console.log(selectedMedico);

    var today = new Date(); // Fecha actual
    var maxDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7); // Fecha límite
    console.log(maxDate);
    var medicoSeleccionado = especialistas.find(medico => medico.matricula === selectedMedico);
    console.log(medicoSeleccionado);
    var diasHabilitados = medicoSeleccionado.diasQueAtiende.filter(dia => {
      // Convertir el día en formato string a objeto Date
      var fecha = getNextDayOfWeek(dia);
      console.log(fecha); 
      return fecha >= today && fecha <= maxDate;
    });
  
    console.log(diasHabilitados);

    var turnosDiponibles = obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado);
    mostrarAgenda(turnosDiponibles);

    });

})

function mostrarAgenda(turnosDisponibles) {
  // Obtener el elemento contenedor de la agenda
  var agendaContainer = document.getElementById('agendaContainer');

  // Limpiar el contenido existente en el contenedor de la agenda
  agendaContainer.innerHTML = '';

  // Crear la tabla de la agenda
  var tablaAgenda = document.createElement('table');
  tablaAgenda.classList.add('agendaTable');

  // Agregar encabezado de la tabla
  var encabezado = tablaAgenda.createTHead();
  var filaEncabezado = encabezado.insertRow();
  var encabezados = ['Fecha', 'Horario'];
  encabezados.forEach(function (encabezado) {
    var celdaEncabezado = document.createElement('th');
    celdaEncabezado.textContent = encabezado;
    filaEncabezado.appendChild(celdaEncabezado);
  });

  // Agregar filas con los turnos disponibles
    turnosDisponibles.forEach(function (turno) {
      var filaTurno = tablaAgenda.insertRow();
      var celdaFecha = filaTurno.insertCell();
      var celdaHorario = filaTurno.insertCell();
  
      // Obtener la fecha correspondiente al turno
      var fechaTurno = getNextDayOfWeek(turno.dia);
  
      // Formatear la fecha como "Día, DD/MM/AAAA"
      var fechaFormateada = obtenerFechaFormateada(fechaTurno);
  
      // Mostrar la fecha, el día y el horario en las celdas correspondientes
      celdaFecha.textContent = fechaFormateada;
      celdaHorario.textContent = turno.horas.toString().padStart(2, '0') + ':' + turno.minutos.toString().padStart(2, '0');

      // Agregar evento de clic a la celda
      filaTurno.addEventListener('click', function () {
      // Remover la clase 'selected' de todas las celdas
      var celdas = document.getElementsByClassName('agendaTable')[0].getElementsByTagName('tr');
      for (var i = 0; i < celdas.length; i++) {
        celdas[i].classList.remove('selected');
      }

      // Agregar la clase 'selected' a la celda seleccionada
      this.classList.add('selected');
    });

    });

  // Agregar la tabla de la agenda al contenedor
  agendaContainer.appendChild(tablaAgenda);
}



  // Aca obtenemos los turnos disponibles para cada especialista

  function obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado) {
    var turnosDisponibles = [];

    diasHabilitados.forEach(dia => {
    var fecha = getNextDayOfWeek(dia);
    var horarioInicio = medicoSeleccionado.horarioInicio;
    var horarioFinalizacion = medicoSeleccionado.horarioFinalizacion;
    var duracionTurno = medicoSeleccionado.duracionTurno;

    var horarioActual = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(), horarioInicio.horas, horarioInicio.minutos);
    var horarioFin = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(), horarioFinalizacion.horas, horarioFinalizacion.minutos);


    while (horarioActual < horarioFin) {
      var turno = {
        dia: dia,
        horas: horarioActual.getHours(),
        minutos: horarioActual.getMinutes()
      };
      
    if (turnoEstaDisponible(turno, medicoSeleccionado.turnosTomados))
      turnosDisponibles.push(turno);

    horarioActual.setTime(horarioActual.getTime() + duracionTurno * 60000); // Sumar la duración del turno en milisegundos
    }

    });
    return turnosDisponibles;
  }


    function turnoEstaDisponible(turno, turnosTomados) {
      // Verificar si el turno está disponible o ya ha sido tomado
      return !turnosTomados.some(turnoTomado => {
        return (
          turnoTomado.dia === turno.dia &&
          turnoTomado.horas === turno.horas &&
          turnoTomado.minutos === turno.minutos
        );
      });
    }

    function getNextDayOfWeek(dayOfWeek) {
      var today = new Date();
      var currentDay = today.getDay(); // Obtener el día actual de la semana (0-6)
      var targetDay = getTargetDayOfWeek(dayOfWeek); // Obtener el día objetivo de la semana (0-6)
    
      // Calcular la diferencia de días hasta el próximo día de la semana objetivo
      var daysToAdd = (targetDay + 7 - currentDay) % 7;
    
      // Sumar la diferencia de días a la fecha actual
      today.setDate(today.getDate() + daysToAdd);
    
      // Establecer la hora en 0 para evitar problemas con la zona horaria
      today.setHours(0, 0, 0, 0);
    
      return today;
    }
    
    function getTargetDayOfWeek(dayOfWeek) {
      var days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
      return days.indexOf(dayOfWeek);
    }

    function obtenerFechaFormateada(fecha) {
      var opcionesFecha = { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' };
      return fecha.toLocaleDateString('es-AR', opcionesFecha);
    }

