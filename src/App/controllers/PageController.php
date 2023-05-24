<?php

namespace Paw\App\controllers;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\Core\Controller;

class PageController extends Controller{

    public function index($procesado= false) {
        require $this ->viewsDir . 'home.view.php';
    }

    public function autoridades() {
        require $this ->viewsDir . '/institucional/autoridades.view.php';
    }

    public function historia() {
        require $this ->viewsDir . '/institucional/historia.view.php';
    }

    public function mision() {
        require $this ->viewsDir . '/institucional/mision.view.php';
    }

    public function valores() {
        require $this ->viewsDir . '/institucional/valores.view.php';
    }

    public function coberturasMedicas() {
        require $this ->viewsDir . '/info-util/coberturasmedicas.view.php';
    }

    public function novedades() {
        require $this ->viewsDir . '/info-util/novedades.view.php';
    }

    public function patologiasytratamientos() {
        require $this ->viewsDir . '/info-util/patologiasytratamientos.view.php';
    }

    public function profyesp() {
        require $this ->viewsDir . '/profyesp.view.php';
    }

    public function trabajaconnosotros($procesado= false) {
        require $this ->viewsDir . '/trabajaconnosotros.view.php';
    }

    public function login() {
        require $this ->viewsDir . '/portal-pacientes/login.view.php';
    }

    public function UI() {
        require $this ->viewsDir . '/turnosUserInterface.view.php';
    }

    public function interfazMedicos() {
        require $this ->viewsDir . '/medicosInterface.view.php';
    }
}