class ObrasSociales {

    constructor() {
      this.fetchObrasSociales()
      .then(() => {
        this.cargarObrasSociales();
        })

      // Espera 3 segundos y luego oculta la alerta
      setTimeout(function() {
        var alerta = document.querySelector('.alerta');
        if (alerta) {
            alerta.style.display = 'none';
        }
      }, 8000);
    }

    fetchObrasSociales() {
        return fetch('/obrasSociales')
          .then(response => response.json())
          .then(data => {
            this.obrasSociales = data;
            console.log(this.obrasSociales);
          });
    }

    cargarObrasSociales() {
        const selectObraSocial = document.querySelector('.obraSocial');
        console.log(selectObraSocial);
        this.obrasSociales.forEach(obraSocial => {
          const option = PAW.nuevoElemento('option',  obraSocial.nombre, {
            value: obraSocial.id
          })
          selectObraSocial.appendChild(option);
        }); 
    }

}