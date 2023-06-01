<?php

namespace Paw\App\controllers;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\Core\Controller;
include 'twig.php';

class PageController extends Controller{

    private $parts = ['menu', 'subMenuInstitucional', 'subMenuInformacionUtil'];

    private function setParts() {
        $this->parts['menu'] = $this->menu;
        $this->parts['subMenuInstitucional'] = $this->subMenuInstitucional;
        $this->parts['subMenuInformacionUtil'] = $this->subMenuInformacionUtil;
    }
    
    public function index($procesado= false) {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('home.view.twig', $this->parts);
        //require $this ->viewsDir . 'home.view.php.twig';
    }

    public function autoridades() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/institucional/autoridades.view.twig', $this->parts);
        //require $this ->viewsDir . '/institucional/autoridades.view.php';
    }

    public function historia() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/institucional/historia.view.twig', $this->parts);        
        //require $this ->viewsDir . '/institucional/historia.view.php';
    }

    public function mision() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/institucional/mision.view.twig', $this->parts);
        //require $this ->viewsDir . '/institucional/mision.view.php';
    }

    public function valores() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/institucional/valores.view.twig', $this->parts);
        //require $this ->viewsDir . '/institucional/valores.view.php';
    }

    public function coberturasMedicas() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/info-util/coberturasmedicas.view.twig', $this->parts);
        //require $this ->viewsDir . '/info-util/coberturasmedicas.view.php';
    }

    public function novedades() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/info-util/novedades.view.twig', $this->parts);
        //require $this ->viewsDir . '/info-util/novedades.view.php';
    }

    public function patologiasytratamientos() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/info-util/patologiasytratamientos.view.twig', $this->parts);
        //require $this ->viewsDir . '/info-util/patologiasytratamientos.view.php';
    }

    public function profyesp() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/profyesp.view.twig', $this->parts);
        //require $this ->viewsDir . '/profyesp.view.php';
    }

    public function trabajaconnosotros($procesado= false) {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/trabajaconnosotros.view.twig', $this->parts);
        //require $this ->viewsDir . '/trabajaconnosotros.view.php';
    }

    public function login() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/portal-pacientes/login.view.twig', $this->parts);
        //require $this ->viewsDir . '/portal-pacientes/login.view.php';
    }

    public function UI() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/turnosUserInterface.view.twig', $this->parts);
        //require $this ->viewsDir . '/turnosUserInterface.view.php';
    }

    public function interfazMedicos() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/medicosInterface.view.twig', $this->parts);
        //require $this ->viewsDir . '/medicosInterface.view.php';
    }

    public function salaEspera() {
        $this->setParts();
        $twig = new TwigClass();
        echo $twig->renderTemp('/salaEspera.view.twig', $this->parts);
        //require $this ->viewsDir . '/salaEspera.view.php';
    }
}