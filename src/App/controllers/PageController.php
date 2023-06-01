<?php

namespace Paw\App\controllers;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\Core\Controller;

class PageController extends Controller{
    
    public function index($procesado= false) {
        echo $this->twig->renderTemp('home.view.twig', $this->parts);
        //require $this ->viewsDir . 'home.view.php.twig';
    }

    public function autoridades() {
        echo $this->twig->renderTemp('/institucional/autoridades.view.twig', $this->parts);
    }

    public function historia() {
        echo $this->twig->renderTemp('/institucional/historia.view.twig', $this->parts);        
    }

    public function mision() {
        echo $this->twig->renderTemp('/institucional/mision.view.twig', $this->parts);
    }

    public function valores() {
        echo $this->twig->renderTemp('/institucional/valores.view.twig', $this->parts);
    }

    public function coberturasMedicas() {
        echo $this->twig->renderTemp('/info-util/coberturasmedicas.view.twig', $this->parts);
    }

    public function novedades() {
        echo $this->twig->renderTemp('/info-util/novedades.view.twig', $this->parts);
    }

    public function patologiasytratamientos() {
        echo $this->twig->renderTemp('/info-util/patologiasytratamientos.view.twig', $this->parts);
    }

    public function profyesp() {
        echo $this->twig->renderTemp('/profyesp.view.twig', $this->parts);
    }

    public function trabajaconnosotros($procesado= false) {
        echo $this->twig->renderTemp('/trabajaconnosotros.view.twig', $this->parts);
    }

    public function login() {
        echo $this->twig->renderTemp('/portal-pacientes/login.view.twig', $this->parts);
    }

    public function UI() {
        echo $this->twig->renderTemp('/turnosUserInterface.view.twig', $this->parts);
    }

    public function interfazMedicos() {
        echo $this->twig->renderTemp('/medicosInterface.view.twig', $this->parts);
    }

    public function salaEspera() {
        echo $this->twig->renderTemp('/salaEspera.view.twig', $this->parts);
    }
}