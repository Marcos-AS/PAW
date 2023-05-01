<?php

namespace Paw\App\controllers;

class EstudioController {

    public function guardarEstudio()
    {
        // Validamos que se haya enviado un archivo
        if (empty($_FILES['archivo']['tmp_name'])) {
            // Si no se envió un archivo, mostramos un mensaje de error
            $response->json(['error' => 'Debes adjuntar un archivo']);
            return;
        }

        // Validamos el formato del archivo
        $formato_permitido = ['.pdf', '.jpg', '.png'];
        $archivo = $_FILES['archivo']['name'];
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        if (!in_array($extension, $formato_permitido)) {
            // Si el formato no está permitido, mostramos un mensaje de error
            $response->json(['error' => 'El formato del archivo no está permitido']);
            return;
        }

        // Aquí puedes guardar el archivo en el servidor, por ejemplo:
        move_uploaded_file($_FILES['archivo']['tmp_name'], '/ruta/para/guardar/archivos/' . $archivo);

        // Si todo está correcto, mostramos un mensaje de éxito
        $response->json(['success' => 'El estudio se guardó correctamente']);
    }

}



