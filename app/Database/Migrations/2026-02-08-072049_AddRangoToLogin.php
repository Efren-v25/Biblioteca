<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRangoToLogin extends Migration
{
    public function up()
    {
        $fields = [
            'rango' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'default'    => 'estudiante',
            ],
        ];
        $this->forge->addColumn('login', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('login', 'rango');
    }
}
