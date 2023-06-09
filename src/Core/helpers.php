<?php

use App\Core\App;

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    $logger = App::get('mvc-app');
    $logger->debug('Datos en la vista', $data);

    return App::get('twig')->render("{$name}.php", $data);
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}
