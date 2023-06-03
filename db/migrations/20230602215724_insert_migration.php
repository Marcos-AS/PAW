<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertMigration extends AbstractMigration
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

        // Insertar datos en la tabla 'obrasocial'
        $this->table('obrasocial')->insert([
            [
                'nombre' => 'IOMA'
            ],
            [
                'nombre' => 'OSDE'
            ]
        ])->saveData();

        
        // Insertar datos en la tabla 'profesional'
        $this->table('profesional')->insert([
            [
                'matricula' => 3737,
                'nombre' => 'Tekito',
                'apellido' => 'Lakarie',
                'horario_inicio' => '09:00:00',
                'horario_fin' => '12:00:00',
                'duracion_turno' => 20
            ],
            [
                'matricula' => 2222,
                'nombre' => 'Tarayado',
                'apellido' => 'Tukoko',
                'horario_inicio' => '13:00:00',
                'horario_fin' => '18:00:00',
                'duracion_turno' => 30
            ]
        ])->saveData();

    }
}
