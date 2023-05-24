class Estudios {
    constructor() {
      this.fetchEstudios();
    }
  
    fetchEstudios() {
      fetch('/assets/scripts/components/tableEstudios/tabla.json')
        .then(response => response.json())
        .then(data => {
          this.estudios = data;
          console.log(this.estudios);
          this.insertarDatos();
        });
    }

    insertarDatos() {
      const tbody = document.querySelector('tbody');
    
      this.estudios.forEach(estudio => {
        const fila = tbody.insertRow();
    
        const celda1 = fila.insertCell();
        celda1.textContent = estudio.Fecha;
    
        const celda2 = fila.insertCell();
        celda2.textContent = estudio.Hora;
    
        const celda3 = fila.insertCell();
        celda3.textContent = estudio.Medico;
    
        const celda4 = fila.insertCell();
        celda4.textContent = estudio.Motivo;
    
        const celda5 = fila.insertCell();
        celda5.textContent = estudio.Servicio;
    
        const celda6 = fila.insertCell();
        celda6.textContent = estudio.Monto;
    
        const celda7 = fila.insertCell();
        celda7.textContent = estudio.Resultados;
      });
    }    
}