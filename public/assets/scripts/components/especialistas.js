class Especialistas {
  constructor() {
    // Obtener el elemento select del formulario
    this.agendaContainer = document.querySelector('#agendaContainer');
    //console.log(this.agendaContainer);
    this.fechaSelect = document.querySelector('#fechaSelect');
    this.horarioSelect = document.querySelector('#horarioSelect');

    const optionInicialFecha = PAW.nuevoElemento('option', 'Ingrese una fecha', {
      value: ''
    })
    //console.log(optionInicialFecha);
    fechaSelect.appendChild(optionInicialFecha);

    const optionInicialHorario = PAW.nuevoElemento('option', 'Ingrese un horario', {
      value: ''
    })
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
        this.initSelectMedico();
      });
  } //end fetchEspecialistas

  initSelectMedico() {
    const selectMedico = document.querySelector('#selectProfesionales');

    const optionInicial = PAW.nuevoElemento('option', 'Ingrese un profesional', {
      value: ''
    })
    selectMedico.appendChild(optionInicial);

    //agrega una option por cada esp. del array json
    this.especialistas.forEach(medico => {
      const option = PAW.nuevoElemento('option', medico.nombre + ' ' + medico.apellido, {
        value: medico.matricula
      })
      selectMedico.appendChild(option);
    });

    selectMedico.addEventListener('change', () => {
      const selectedMedico = selectMedico.value;
      //console.log(selectedMedico);

      const today = new Date();
      //maxDate es desde hoy a 7 días
      const maxDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
      //console.log(maxDate);

      //busca en el array la matricula que coincida con el valor de la option seleccionada
      const medicoSeleccionado = 
        this.especialistas.find(medico => medico.matricula === selectedMedico);
      //console.log(medicoSeleccionado);

      //obtiene los dias que atiende cada esp.
      //filter crea un array
      const diasHabilitados = medicoSeleccionado.diasQueAtiende.filter(dia => {
        const fecha = this.getNextDayOfWeek(dia); //obtiene tipo Date
        return fecha >= today && fecha <= maxDate;
      }); //end filter

      console.log(diasHabilitados)

      const turnosDiponibles = this.obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado);
      //this.mostrarAgenda(turnosDiponibles);
      this.mostrarFechasDisponibles(turnosDiponibles);
    }); //end addEventListener change
  } //end initSelectMedico

    //retorna prox Date del dia (string) que le llega
    getNextDayOfWeek(dayOfWeek) {
      const today = new Date();
      const currentDay = today.getDay(); //num de dia de la semana
      const targetDay = this.getTargetDayOfWeek(dayOfWeek); //obtiene num de dia de la semana
      const daysToAdd = (targetDay + 7 - currentDay) % 7; //(1+7-6) % 7 = 2

      today.setDate(today.getDate() + daysToAdd); //cambia dia del mes 
      today.setHours(0, 0, 0, 0);
      return today;
    } //end getNextDayOfWeek

  // Aca obtenemos los turnos disponibles para cada especialista
  obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado) {
    const turnosDisponibles = [];
    //console.log(diasHabilitados);
    diasHabilitados.forEach(dia => {
      const fecha = this.getNextDayOfWeek(dia); //Date
      const horarioInicio = medicoSeleccionado.horarioInicio;
      const horarioFinalizacion = medicoSeleccionado.horarioFinalizacion;
      const duracionTurno = medicoSeleccionado.duracionTurno;
    
      const horarioActual = 
          new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(),
          horarioInicio.horas, horarioInicio.minutos); //
      const horarioFin = new Date(fecha.getFullYear(), fecha.getMonth(),
       fecha.getDate(), horarioFinalizacion.horas, horarioFinalizacion.minutos);
    
      while (horarioActual < horarioFin) {
        const turno = {
          dia: dia,
          horas: horarioActual.getHours(),
          minutos: horarioActual.getMinutes()
        };
        //console.log(turno);
    
        if (this.turnoEstaDisponible(turno, medicoSeleccionado.turnosTomados))
          turnosDisponibles.push(turno);
    
        horarioActual.setTime(horarioActual.getTime() + duracionTurno * 60000);
      }
    });
    //console.log(turnosDisponibles);
    return turnosDisponibles;
  } //end obtenerTurnosDisponibles

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
  } //end mostrarFechasDisponibles
  
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
  } //end mostrarAgenda

  turnoEstaDisponible(turno, turnosTomados) {
    return !turnosTomados.some(turnoTomado => {
      return (
        turnoTomado.dia === turno.dia &&
        turnoTomado.horas === turno.horas &&
        turnoTomado.minutos === turno.minutos
      );
    });
  } //end turnoEstaDisponible

  //retorna num de dia de la semana
  getTargetDayOfWeek(dayOfWeek) {
    const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    return days.indexOf(dayOfWeek);
  }

  obtenerFechaFormateada(fecha) {
    const opcionesFecha = { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' };
    return fecha.toLocaleDateString('es-AR', opcionesFecha);
  }

}


  