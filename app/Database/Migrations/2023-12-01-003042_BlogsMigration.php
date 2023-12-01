<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BlogsMigration extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id" =>  [
                "type" => "INT",
                "unsigned" => true,
            "constraint" => 5,
            "auto_increment" =>true,
                    ],
                    "category_id" =>  [
                        "type" => "INT",
                        "unsigned" => true,
                    "constraint" => 5,
                    

                            ],
                    "title" => 
                        [
                            "type" => "VARCHAR",
                            "constraint" => 100,
                            "null" => false
                        ],
                    
                    "content" => [
                        "type" => "text",
                        "null" => true,
                    ],
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("blogs");

    }

    public function down()
    {
        $this->forge->dropTable("blogs");
        //
    }
}
