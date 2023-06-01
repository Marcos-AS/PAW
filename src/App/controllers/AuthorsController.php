<?php

namespace Paw\App\Controllers;

use Paw\Core\Controller;
use Paw\App\Models\AutoresCollection;
use Paw\Core\Database\QueryBuilder;


class AuthorsController extends Controller {

    public ?string $modelName = AutoresCollection::class;
       
    public function index() {
        $titulo = "Autores";
        $authors = $this -> model -> getAll();
        require $this -> viewsDir . 'authors.index.view.php';
    }

    public function get() {
        global $request;
        $authorId = $request -> get('Id');
        $author = $this -> model -> get($authorId);
        $titulo = 'Autor';
        require $this -> viewsDir . 'authors.show.view.php';   
    }

    public function edit() {

    }

    public function set() {

    }

}