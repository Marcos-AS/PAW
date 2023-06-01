class Autoridades {
    
    constructor() {
        const links = document.querySelectorAll('.navAutoridades a');

        links.forEach(link => {
            link.addEventListener('click', () => {
                // Obtenemos el target desde el atributo data-target
                const target = link.getAttribute('data-target');
        
                // Ocultamos todas las listas
                document.querySelectorAll('.autoridades ul').forEach(list => {
                    list.style.display = 'none';
                });
        
                // Mostramos la lista correspondiente
                document.querySelector(`.${target}`).style.display = 'block';
        
                // Agregamos la clase activo al enlace seleccionado
                links.forEach(link => {
                    link.classList.remove('activo');
                });
                link.classList.add('activo');
            });
        });
    }

}

