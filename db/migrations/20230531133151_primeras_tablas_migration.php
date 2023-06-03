<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PrimerasTablasMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
    /*$tableAutor = $this->table('autor', ['id' => false, 'primary_key' => 'id']);
    $tableAutor->addColumn('id', 'biginteger', ['identity' => true])
        ->addColumn('nombre', 'string', ['limit' => 60])
        ->addColumn('email', 'string', ['null' => true])
        ->create(); */
    
    $tableProfesional = $this->table('profesional', ['id' => false, 'primary_key' => 'matricula']);
    $tableProfesional->addColumn('matricula', 'biginteger', ['null' => false])
        ->addColumn('nombre', 'string', ['limit' => 60])
        ->addColumn('apellido', 'string', ['limit' => 60])
        ->addColumn('horario_inicio', 'time')
        ->addColumn('horario_fin', 'time')
        ->addColumn('duracion_turno', 'integer')
        ->create();

    $tableEspecialidad = $this->table('especialidad', ['id' => false, 'primary_key' => 'id']);
    $tableEspecialidad->addColumn('id', 'biginteger', ['identity' => true])
        ->addColumn('descripcion', 'string', ['limit' => 60])
        ->create();

    $tableObraSocial = $this->table('obrasocial', ['id' => false, 'primary_key' => 'id']);
    $tableObraSocial->addColumn('id', 'biginteger', ['identity' => true])
        ->addColumn('nombre', 'string', ['limit' => 60])
        ->create();
    
    $tablePaciente = $this->table('paciente', ['id' => false, 'primary_key' => 'dni']);
    $tablePaciente->addColumn('dni', 'biginteger', ['null' => false])
        ->addColumn('nombre', 'string', ['limit' => 60])
        ->addColumn('apellido', 'string', ['limit' => 60])
        ->addColumn('email', 'string')
        ->addColumn('password', 'string', ['limit' => 60])
        ->addColumn('telefono', 'biginteger', ['limit' => 60])
        ->addColumn('obrasocial_id', 'biginteger', ['null' => true])
        ->addForeignKey('obrasocial_id', 'obrasocial', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
        ->create();
    
    $tableTurno = $this->table('turno');
    $tableTurno->addColumn('dni', 'biginteger')
        ->addColumn('nombre', 'string')
        ->addColumn('apellido', 'string')
        ->addColumn('fechanacimiento', 'date')
        ->addColumn('edad', 'integer')
        ->addColumn('telefono', 'biginteger')
        ->addColumn('email', 'string')
        ->addColumn('profesional_id', 'biginteger')
        ->addColumn('obrasocial_id', 'biginteger')
        ->addColumn('fecha', 'date', ['null' => false])
        ->addColumn('horario', 'time', ['null' => false])
//        ->addForeignKey('dni', 'paciente', 'dni', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
        ->addForeignKey('obrasocial_id', 'obrasocial', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
        ->addForeignKey('profesional_id', 'profesional', 'matricula', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
        ->create();
        

    /*$tableTasks = $this->table('tasks');
    $tableTasks->addColumn('titulo', 'string', ['limit' => 60])
        ->addColumn('descripcion', 'string', ['null' => true])
        ->addColumn('autor', 'biginteger')
        ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
        ->addForeignKey('autor', 'autor', 'id')
        ->create(); */
    }
}
