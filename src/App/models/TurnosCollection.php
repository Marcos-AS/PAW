<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Turno;
use Paw\App\Models\Profesional;
use DateTime;

class TurnosCollection extends Model {
    
    public $table = 'turno';

    public function set($turno) {
        
        $dateString = $turno->fields['fecha'];
        // Eliminamos el día de la semana y los espacios en blanco
        $dateString = preg_replace("/^[a-záéíóúñü]+,\s*/i", "", $dateString);

        // Convertimos la cadena en un objeto de tipo DateTime
        $date = DateTime::createFromFormat("j/n/Y", $dateString);

        // Obtenemos la fecha formateada en el formato deseado
        $formattedDate = date_format($date, "Y-m-d");
        
        $turno->setFecha($formattedDate);

        try {
            $this->queryBuilder->insert($this->table, $turno);
        } catch (DatabaseException $e) {
            // Manejar el error de la base de datos, mostrar mensaje, registrar, etc.
            echo "Ocurrió un error al insertar el turno: " . $e->getMessage();
        } catch (InvalidDataException $e) {
            // Manejar el error de datos inválidos, mostrar mensaje, registrar, etc.
            echo "Los datos del turno son inválidos: " . $e->getMessage();
        } catch (InvalidValueFormatException $e) {
            // Manejar el error de formato de valor inválido, mostrar mensaje, registrar, etc.
            echo "El formato de un valor proporcionado es inválido: " . $e->getMessage();
        }
    }

    public function getProfesionales() {
        $profesionales = $this->queryBuilder->select('profesional'); 
        $profesionalesCollection = [];
        foreach ($profesionales as $profesional) {
            $newProfesional = new Profesional;
            $newProfesional -> set($profesional);
            $profesionalesCollection[] = $newProfesional;
        }
        //print_r($profesionalesCollection);
    return $profesionalesCollection;
    }
    
    public function getDiasQueAtiende($matricula) {
        return $this->queryBuilder->select('profesional_dia', ['matricula' => $matricula]);
    }

    public function getTurnosTomados($matricula) {
        return $this->queryBuilder->select('turno', ['profesional_id' => $matricula]);
    }

    public function getObrasSociales() {
        $obrasSociales = $this->queryBuilder->select('obrasocial'); 
        $obrasSocialesCollection = [];
        foreach ($obrasSociales as $obraSocial) {
            $newObraSocial = new ObraSocial;
            $newObraSocial -> set($obraSocial);
            $obrasSocialesCollection[] = $newObraSocial;
        }
        return $obrasSocialesCollection;
    }

}