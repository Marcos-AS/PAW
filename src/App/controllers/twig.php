<?php

namespace Paw\App\controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigClass {
    private $templatesDir;
    private $loader;
    private $twig;
    
    public function __construct() {
        $this->templatesDir = __DIR__ . '/../views';
        $this->loader = new FilesystemLoader($this->templatesDir);
        $this->twig = new Environment($this->loader, [
            'cache' => false,
            'debug' => true,
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function renderTemp($temp, $data) {
        echo $this->twig->render($temp,$data);
    }
}