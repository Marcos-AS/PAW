<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Página de inicio </title>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página de inicio de clínica médica">
        <meta name="keywords" content="clinica, salud">
        <link rel="stylesheet" href="https://unpkg.com/browse/reset-css@5.0.1/reset.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/global.css">
        <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    </head>
    <body>

        <?php require __DIR__ . '/./parts/header.view.php' ?>

        <?php require __DIR__ . '/./parts/nav.view.php' ?>

        <section id="sBusqueda">
            <h2>Bienvenido a nuestro sitio oficial</h2>
            <h3>Encontra a tu profesional</h3>
            <form>
                <label for="inputSearch">
                    <input type="search" name="inputSearch">
                </label>
                <a href="">
                    <i id="lupa" class="icono-search"></i>
                </a>
            </form>
            <a class="botonReservar" href="https://api.whatsapp.com/send?phone=54 2346 627605&text=Hola, Necesito mas informacion!">
                <img id="whatsapp" src="assets/imgs/whatsapp.png" alt="Logo de WhatsApp" />    
            </a>
        </section>
        
        <section class="contenedor">
            <section class="sMapa">
            <h3>¿Donde encontrarnos?</h3>
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13088.495915509864!2d-60.01438485!3d-34.9033381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1681595424190!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        
        <section class="consulta">
            <h3>Envianos tu consulta aquí</h3>
            <form>
                <label for="inputNombre">
                    Nombre
                    <input type="text" name="inputNombre">
                </label>
                <label for="inputEmail">
                    Email
                    <input type="email" name="inputEmail">
                </label>
                <label for="inputConsulta">
                    Consulta
                    <input type="text" name="inputConsulta">    
                </label>
                <label for="inputSubmit">
                     <input type="submit" name="inputSubmit">
                </label>                
            </form>
        </section>
    </section>

    <section class="informacion">
        <section>
            <img src="/assets/imgs/clinica-medica.svg">
            <h4>Atención 24 hs</h4>
            <p>Sabemos que la salud no descansa, por eso en nuestra clínica ofrecemos atención médica 
                las 24 horas del día, los 365 días del año. 
                Contamos con un equipo altamente capacitado y equipamiento de última generación 
                para brindar la mejor atención a nuestros pacientes en cualquier momento.
            </p>
        </section>
        <section>
            <img src="/assets/imgs/calificacion.svg">
            <h4>Calificacion Prime</h4>
            <p> Estamos orgullosos de contar con la calificación Prime otorgada por el ITAES - Instituto 
                Técnico para la Acreditación de Establecimientos de Salud. Esta distinción nos coloca 
                entre los establecimientos de salud de mayor excelencia en el país. Haremos todo lo posible por seguir por el mismo camino.
            </p>
        </section>
        <section>
            <img src="/assets/imgs/trayectoria.svg">
            <h4>Desarrollo continuo</h4>
            <p> Desde nuestros inicios, nos hemos propuesto estar a la vanguardia en tecnología médica, 
                investigación y formación continua de nuestro equipo profesional. 
                A lo largo de nuestra trayectoria, hemos logrado importantes avances y mejoras en 
                la atención de nuestros pacientes.
            </p>
        </section>
    </section>

        <?php require __DIR__ . '/./parts/footer.view.php' ?>
        
        <script src="assets/scripts/hamburguesa.js"></script>

    </body>

</html>
