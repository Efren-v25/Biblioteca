<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeCodeNullableInLogin extends Migration
{
    public function up()
    {
        $fields = [
            'code' => [
                'type'       => 'INT',
                'constraint' => 6,
                'null'       => true,
            ],
        ];
        $this->forge->modifyColumn('login', $fields);
    }

    public function down()
    {
        $fields = [
            'code' => [
                'type'       => 'INT',
                'constraint' => 6,
                'null'       => false,
            ],
        ];
        $this->forge->modifyColumn('login', $fields);
    }
}
