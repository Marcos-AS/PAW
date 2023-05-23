class Especialistas {
  constructor() {
    // Obtener el elemento select del formulario
    this.agendaContainer = document.getElementById('agendaContainer');
    this.fechaSelect = document.getElementById('fechaSelect');
    this.horarioSelect = document.getElementById('horarioSelect');

    const optionInicialFecha = document.createElement('option');
    optionInicialFecha.value = '';
    optionInicialFecha.textContent = 'Ingrese una fecha';
    fechaSelect.appendChild(optionInicialFecha);

    const optionInicialHorario = document.createElement('option');
    optionInicialHorario.value = '';
    optionInicialHorario.textContent = 'Ingrese un horario';
    horarioSelect.appendChild(optionInicialHorario);

    // Deshabilitar los inputs de fecha y horario inicialmente
    this.fechaSelect.disabled = true;
    this.horarioSelect.disabled = true;

    this.fetchEspecialistas();
  }

  fetchEspecialistas() {
    fetch('assets/data/especialistas.json')
      .then(response => response.json())
      .then(data => {
        this.especialistas = data.especialistas;
        console.log(this.especialistas);
        this.initSelectMedico();
      });
  }

  initSelectMedico() {
    const selectMedico = document.getElementById('selectProfesionales');

    const optionInicial = document.createElement('option');
    optionInicial.value = '';
    optionInicial.textContent = 'Ingrese un profesional';
    selectMedico.appendChild(optionInicial);

    this.especialistas.forEach(medico => {
      const option = document.createElement('option');
      option.value = medico.matricula;
      option.textContent = medico.nombre + ' ' + medico.apellido;
      selectMedico.appendChild(option);
    });

    selectMedico.addEventListener('change', () => {
      const selectedMedico = selectMedico.value;
      console.log(selectedMedico);

      const today = new Date();
      const maxDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
      console.log(maxDate);

      const medicoSeleccionado = this.especialistas.find(medico => medico.matricula === selectedMedico);
      console.log(medicoSeleccionado);

      const diasHabilitados = medicoSeleccionado.diasQueAtiende.filter(dia => {
        const fecha = this.getNextDayOfWeek(dia);
        console.log(fecha);
        return fecha >= today && fecha <= maxDate;
      });

      console.log(diasHabilitados);

      const turnosDiponibles = this.obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado);
      //this.mostrarAgenda(turnosDiponibles);
      this.mostrarFechasDisponibles(turnosDiponibles);
    });
  }

  mostrarFechasDisponibles(turnosDisponibles) {
    this.fechaSelect.innerHTML = '';
    this.horarioSelect.innerHTML = '';

    const fechasDisponibles = [];
    turnosDisponibles.forEach(turno => {
      const fechaTurno = this.getNextDayOfWeek(turno.dia);
      const fechaFormateada = this.obtenerFechaFormateada(fechaTurno);

      if (!fechasDisponibles.includes(fechaFormateada)) {
        fechasDisponibles.push(fechaFormateada);
        const optionFecha = document.createElement('option');
        optionFecha.value = fechaFormateada;
        optionFecha.textContent = fechaFormateada;
        fechaSelect.appendChild(optionFecha);
      }
    });

    this.fechaSelect.disabled = false;

    fechaSelect.addEventListener('change', () => {
      const fechaSeleccionada = fechaSelect.value;
      const horariosTurno = turnosDisponibles.filter(turno => {
        const fechaTurno = this.obtenerFechaFormateada(this.getNextDayOfWeek(turno.dia));
        return fechaTurno === fechaSeleccionada;
      });
  
      horariosTurno.forEach(horario => {
        const optionHorario = document.createElement('option');
        optionHorario.value = horario.horas.toString().padStart(2, '0') + ':' + horario.minutos.toString().padStart(2, '0');
        optionHorario.textContent = optionHorario.value;
        horarioSelect.appendChild(optionHorario);
      });

      this.horarioSelect.disabled = false;
    });
  }
  
  mostrarAgenda(turnosDisponibles) {
    this.agendaContainer.innerHTML = '';

    const tablaAgenda = document.createElement('table');
    tablaAgenda.classList.add('agendaTable');

    const encabezado = tablaAgenda.createTHead();
    const filaEncabezado = encabezado.insertRow();
    const encabezados = ['Fecha', 'Horario'];
    encabezados.forEach(encabezado => {
      const celdaEncabezado = document.createElement('th');
      celdaEncabezado.textContent = encabezado;
      filaEncabezado.appendChild(celdaEncabezado);
    });

    turnosDisponibles.forEach(turno => {
      const filaTurno = tablaAgenda.insertRow();
      const celdaFecha = filaTurno.insertCell();
      const celdaHorario = filaTurno.insertCell();

      const fechaTurno = this.getNextDayOfWeek(turno.dia);
      const fechaFormateada = this.obtenerFechaFormateada(fechaTurno);

      celdaFecha.textContent = fechaFormateada;
      celdaHorario.textContent = turno.horas.toString().padStart(2, '0') + ':' + turno.minutos.toString().padStart(2, '0');

      filaTurno.addEventListener('click', function() {
        const celdas = document.getElementsByClassName('agendaTable')[0].getElementsByTagName('tr');
        for (let i = 0; i < celdas.length; i++) {
          celdas[i].classList.remove('selected');
        }

        this.classList.add('selected');
      });
    });

    this.agendaContainer.appendChild(tablaAgenda);
  }

  // Aca obtenemos los turnos disponibles para cada especialista
  obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado) {
    const turnosDisponibles = [];
    console.log(diasHabilitados);
    diasHabilitados.forEach(dia => {
      const fecha = this.getNextDayOfWeek(dia);
      const horarioInicio = medicoSeleccionado.horarioInicio;
      const horarioFinalizacion = medicoSeleccionado.horarioFinalizacion;
      const duracionTurno = medicoSeleccionado.duracionTurno;
    
      const horarioActual = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(), horarioInicio.horas, horarioInicio.minutos);
      const horarioFin = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(), horarioFinalizacion.horas, horarioFinalizacion.minutos);
    
      while (horarioActual < horarioFin) {
        const turno = {
          dia: dia,
          horas: horarioActual.getHours(),
          minutos: horarioActual.getMinutes()
        };
        console.log(turno);
    
        if (this.turnoEstaDisponible(turno, medicoSeleccionado.turnosTomados))
          turnosDisponibles.push(turno);
    
        horarioActual.setTime(horarioActual.getTime() + duracionTurno * 60000);
      }
    });
    console.log(turnosDisponibles);
    return turnosDisponibles;
  }

  turnoEstaDisponible(turno, turnosTomados) {
    return !turnosTomados.some(turnoTomado => {
      return (
        turnoTomado.dia === turno.dia &&
        turnoTomado.horas === turno.horas &&
        turnoTomado.minutos === turno.minutos
      );
    });
  }
    
  getNextDayOfWeek(dayOfWeek) {
    const today = new Date();
    const currentDay = today.getDay();
    const targetDay = this.getTargetDayOfWeek(dayOfWeek);
    console.log(targetDay);
    const daysToAdd = (targetDay + 7 - currentDay) % 7;

    today.setDate(today.getDate() + daysToAdd);
    today.setHours(0, 0, 0, 0);
    return today;
  }

  getTargetDayOfWeek(dayOfWeek) {
    const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    return days.indexOf(dayOfWeek);
  }

  obtenerFechaFormateada(fecha) {
    const opcionesFecha = { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' };
    return fecha.toLocaleDateString('es-AR', opcionesFecha);
  }

}


  