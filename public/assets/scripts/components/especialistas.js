class Especialistas {

  constructor() {
    this.fechaSelect = document.querySelector('#fechaSelect');
    this.horarioSelect = document.querySelector('#horarioSelect');

    this.fetchEspecialistas()
    .then(() => {
      this.initSelectMedico();
      })
  }

  fetchEspecialistas() {
    return fetch('/especialistas')
      .then(response => response.json())
      .then(data => {
        this.especialistas = data;
      });
  } // end fetchEspecialistas */

  initSelectMedico() {
    const selectMedico = document.querySelector('#selectProfesionales');

    console.log(this.especialistas)
    //agrega una option por cada esp. del array json
    this.especialistas.forEach(medico => {
      const option = PAW.nuevoElemento('option', medico.nombre + ' ' + medico.apellido, {
        value: medico.matricula
      })
      selectMedico.appendChild(option);
    }); 

    selectMedico.addEventListener('change', () => {
      this.fechaSelect.disabled = false;
      const selectedMedico = selectMedico.value;
      //busca en el array el medico por la matricula
      const medicoSeleccionado = 
        this.especialistas.find(medico => medico.matricula.toString() === selectedMedico.toString()); 
      const diasHabilitados = medicoSeleccionado.diasQueAtiende; //dias que atiende cada esp.
      console.log(medicoSeleccionado)
      console.log(diasHabilitados)
      const turnosDiponibles = 
        this.obtenerTurnosDisponibles(diasHabilitados, medicoSeleccionado);
      //this.mostrarAgenda(turnosDiponibles);
      this.mostrarFechasDisponibles(turnosDiponibles);
    }); //end addEventListener change
  } // end initSelectMedico

  //retorna un array de object turno con dia, horas, minutos

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
  
  
  obtenerFechaFormateada(fecha) {
    const opcionesFecha = { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' };
    return fecha.toLocaleDateString('es-AR', opcionesFecha);
  } // end obtenerFechaFormateada

}  