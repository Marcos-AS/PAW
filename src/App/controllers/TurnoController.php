<?php

namespace Paw\App\controllers;
use Paw\Core\Controller;
use Paw\App\models\Turno;
use Paw\App\models\TurnosCollection;

class TurnoController extends Controller{

    public ?string $modelName = TurnosCollection::class;

    public function solicitarTurnoValidar() {
        // Verificar si el usuario está logueado
        session_start();
        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
        // El usuario está logueado, se puede continuar con la lógica del programa
        // ...
            $turno = new Turno();
            $turno -> setNombre($_POST['nombre']);
            $turno -> setApellido($_POST['apellido']);
            $turno -> setFechaNacimiento($_POST['fechanacimiento']);
            $turno -> setDni($_POST['dni']);
            $turno -> setEdad($_POST['edad']);
            $turno -> setEmail($_POST['email']);
            $turno -> setTelefono($_POST['telefono']);
            $turno -> setObraSocial($_POST['obraSocial']);
            $turno -> setEspecialista($_POST['especialista']);
            $turno -> setFecha($_POST['fecha']);
            $turno -> setHorario($_POST['horario']);
        
            $this->model->set($turno);

            $this->solicitarTurno(true);
        } else {
        // El usuario no está logueado, realizar acciones en consecuencia
        // Redirigir a una página de inicio de sesión, mostrar un mensaje, etc.
        echo $this->twig->renderTemp('/portal-pacientes/login.view.twig', $this->parts);
        }

    }

    public function solicitarTurno($procesado = false) {
      //  $profesionales = $this->model->getProfesionales();
      //  $data = array_merge($this->parts, ['profesionales' => $profesionales]);
        $mensaje = '';

        if ($procesado) {
            $mensaje = '¡El turno ha sido solicitado correctamente!';
        }
        echo $this->twig->renderTemp('solicitarTurno.view.twig', ['mensaje' => $mensaje]);
        //require $this ->viewsDir . '/solicitarTurno.view.twig';
    }

    public function obtenerEspecialistas() {
        $profesionales = $this->model->getProfesionales();
        foreach ($profesionales as $profesional) {
            $especialista = $profesional->fields; 
            $especialista['diasQueAtiende'] = $this->model->getDiasQueAtiende($profesional->fields['matricula']);
            $especialista['turnosTomados'] = $this->model->getTurnosTomados($profesional->fields['matricula']);
            $especialistas[] = $especialista;
        }
        header('Content-Type: application/json');
        echo $json = json_encode($especialistas, JSON_UNESCAPED_UNICODE);
    }

    public function obtenerObrasSociales() {
        $obrasSociales = $this->model->getObrasSociales();
        foreach ($obrasSociales as $obraSocial) {
            $obra = $obraSocial->fields; 
            $obras[] = $obra;
        }
        header('Content-Type: application/json');
        echo $json = json_encode($obras, JSON_UNESCAPED_UNICODE);
    }

}