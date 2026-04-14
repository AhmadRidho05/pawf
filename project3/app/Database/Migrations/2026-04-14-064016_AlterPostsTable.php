<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPostsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
        ]);
    }

    public function down()
    {
    }
}