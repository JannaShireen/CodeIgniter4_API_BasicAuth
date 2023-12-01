<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=> [
                "type" => "INT",
                "unsigned" => true,
            "constraint" => 5,
            "auto_increment" =>true,
                    ],
                "name" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                    "null" => false
                ],
                "status" => [
                    "type" => "ENUM",
                    "constraint" => ['1','0'],
                    "default" => '1',
                    

                ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("categories");
        //
    }

    public function down()
    {
        $this->forge->dropTable("categories");
        //
    }
}
