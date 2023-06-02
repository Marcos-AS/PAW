<?php

namespace Paw\App\controllers;
use Paw\Core\Controller;
use Paw\App\models\Turno;
use Paw\App\models\TurnosCollection;

class TurnoController extends Controller{

    public ?string $modelName = TurnosCollection::class;

    public function solicitarTurnoValidar() {
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
    }

    public function solicitarTurno($procesado = false) {
        echo $this->twig->renderTemp('solicitarTurno.view.twig', $this->parts);
        //require $this ->viewsDir . '/solicitarTurno.view.twig';
    }

}