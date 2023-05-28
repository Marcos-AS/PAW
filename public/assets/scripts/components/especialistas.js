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

  //*****************************************************

  fetchEspecialistas() {
    fetch('assets/data/especialistas.json')
      .then(response => response.json())
      .then(data => {
        this.especialistas = data.especialistas;
        this.initSelectMedico();
      });
  } // end fetchEspecialistas

  //*****************************************************


  initSelectMedico() {
    const selectMedico = document.querySelector('#selectProfesionales');

    //agrega option inicial de seleccionar medico
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
      //busca en el array el medico por la matricula
      const medicoSeleccionado = 
        this.especialistas.find(medico => medico.matricula === selectedMedico); 
      const diasHabilitados = medicoSeleccionado.diasQueAtiende; //dias que atiende cada esp.
      const turnosDiponibles = this.obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado);
      //this.mostrarAgenda(turnosDiponibles);
      this.mostrarFechasDisponibles(turnosDiponibles);
    }); //end addEventListener change
  } // end initSelectMedico

  //*****************************************************

  // Aca obtenemos los turnos disponibles para cada especialista

  obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado) {
    const turnosDisponibles = [];
    const horarioInicio = medicoSeleccionado.horarioInicio;
    const horarioFinalizacion = medicoSeleccionado.horarioFinalizacion;
    const duracionTurno = medicoSeleccionado.duracionTurno;
    
    diasHabilitados.forEach(dia => {
      const fecha = this.getNextDayOfWeek(dia); //Date
      const horarioActual = 
          new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate(),
          horarioInicio.horas, horarioInicio.minutos); 
      const horarioFin = new Date(fecha.getFullYear(), fecha.getMonth(),
       fecha.getDate(), horarioFinalizacion.horas, horarioFinalizacion.minutos);
    
      while (horarioActual < horarioFin) {
        const turno = {
          dia: dia,
          horas: horarioActual.getHours(),
          minutos: horarioActual.getMinutes()
        };
    
        if (this.turnoEstaDisponible(turno, medicoSeleccionado.turnosTomados))
          turnosDisponibles.push(turno);        
        horarioActual.setTime(horarioActual.getTime() + duracionTurno * 60000);
      }
    }); // end forEach
    return turnosDisponibles;
  } // end obtenerTurnosDisponibles

//*****************************************************

  // retorna prox Date del dia (string) que le llega

  getNextDayOfWeek(dayOfWeek) {
    const today = new Date();
    const currentDay = today.getDay(); //num de dia de la semana
    const targetDay = this.getTargetDayOfWeek(dayOfWeek); //obtiene num de dia de la semana
    const daysToAdd = (targetDay + 7 - currentDay) % 7;

    today.setDate(today.getDate() + daysToAdd); //cambia dia del mes 
    today.setHours(0, 0, 0, 0);
    return today;
  } // end getNextDayOfWeek

  // retorna num de dia de la semana

  getTargetDayOfWeek(dayOfWeek) {
    const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    return days.indexOf(dayOfWeek);
  }

  //*****************************************************

  // revisa si turno coincide con algún turnoTomado

  turnoEstaDisponible(turno, turnosTomados) {
    return !turnosTomados.some(turnoTomado => {
      return (
        turnoTomado.dia === turno.dia &&
        turnoTomado.horas === turno.horas &&
        turnoTomado.minutos === turno.minutos
      );
    });
  } // end turnoEstaDisponible

  //*****************************************************

  // agrega las option a los select de fecha y hora

  mostrarFechasDisponibles(turnosDisponibles) {
    this.fechaSelect.innerHTML = '';
    this.horarioSelect.innerHTML = '';
    
    const fechasDisponibles = [];
    
    //agrega option inicial al fechaSelect y al horarioSelect
    const optionInicialFecha = PAW.nuevoElemento('option', 'Ingrese una fecha', {
      value: ''
    })
    this.fechaSelect.appendChild(optionInicialFecha);

    const optionInicialHora = PAW.nuevoElemento('option', 'Ingrese un horario', {
      value: ''
    })
    this.horarioSelect.appendChild(optionInicialHora);


    //agrega fechas
    turnosDisponibles.forEach(turno => {
      const fechaTurno = this.getNextDayOfWeek(turno.dia);
      const fechaFormateada = this.obtenerFechaFormateada(fechaTurno);

      //si no está en el array de fechasDispo, la agrega al array y agrega option al select
      if (!fechasDisponibles.includes(fechaFormateada)) {
        fechasDisponibles.push(fechaFormateada);
        const optionFecha = PAW.nuevoElemento('option', fechaFormateada, {
          value: fechaFormateada
        })
        fechaSelect.appendChild(optionFecha);
      }
    });
  
    
    this.fechaSelect.disabled = false;


    //cuando cambia el select de fecha, agrega las option con horarios
    fechaSelect.addEventListener('change', () => {
      
      //elimina las option horario de la fecha anteriormente seleccionada
      for (let index = this.horarioSelect.childElementCount-1; index >= 0; index--) {
        this.horarioSelect.removeChild(this.horarioSelect.childNodes[index]);
      }

      const fechaSeleccionada = fechaSelect.value;
      const horariosTurno = turnosDisponibles.filter(turno => {
        const fechaTurno = this.obtenerFechaFormateada(this.getNextDayOfWeek(turno.dia));
        return fechaTurno === fechaSeleccionada;
      });
      
      //agrega las option con horarios
      horariosTurno.forEach(horario => {
        const optionHorario = PAW.nuevoElemento('option', '', {
          value: horario.horas.toString().padStart(2, '0') + ':' + 
          horario.minutos.toString().padStart(2, '0') //agrega 0s al comienzo hasta 2 char
        })
        optionHorario.textContent = optionHorario.value;
        horarioSelect.appendChild(optionHorario);
      });

      this.horarioSelect.disabled = false;
    });
  } // end mostrarFechasDisponibles
  
  //*****************************************************

  obtenerFechaFormateada(fecha) {
    const opcionesFecha = { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' };
    return fecha.toLocaleDateString('es-AR', opcionesFecha);
  } // end obtenerFechaFormateada

  // mostrarAgenda(turnosDisponibles) {
  //   this.agendaContainer.innerHTML = '';

  //   const tablaAgenda = document.createElement('table');
  //   tablaAgenda.classList.add('agendaTable');

  //   const encabezado = tablaAgenda.createTHead();
  //   const filaEncabezado = encabezado.insertRow();
  //   const encabezados = ['Fecha', 'Horario'];
  //   encabezados.forEach(encabezado => {
  //     const celdaEncabezado = document.createElement('th');
  //     celdaEncabezado.textContent = encabezado;
  //     filaEncabezado.appendChild(celdaEncabezado);
  //   });

  //   turnosDisponibles.forEach(turno => {
  //     const filaTurno = tablaAgenda.insertRow();
  //     const celdaFecha = filaTurno.insertCell();
  //     const celdaHorario = filaTurno.insertCell();

  //     const fechaTurno = this.getNextDayOfWeek(turno.dia);
  //     const fechaFormateada = this.obtenerFechaFormateada(fechaTurno);

  //     celdaFecha.textContent = fechaFormateada;
  //     celdaHorario.textContent = turno.horas.toString().padStart(2, '0') + ':' + turno.minutos.toString().padStart(2, '0');

  //     filaTurno.addEventListener('click', function() {
  //       const celdas = document.getElementsByClassName('agendaTable')[0].getElementsByTagName('tr');
  //       for (let i = 0; i < celdas.length; i++) {
  //         celdas[i].classList.remove('selected');
  //       }

  //       this.classList.add('selected');
  //     });
  //   });

  //  this.agendaContainer.appendChild(tablaAgenda);
  //} //end mostrarAgenda
}  