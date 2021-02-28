<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renamecolumnknowntechnologytable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('known_technologies', function (Blueprint $table) {
            $table->renameColumn('name', 'known_technology_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('known_technologies', function (Blueprint $table) {
            $table->renameColumn('known_technology_name', 'name');
        });
    }
}
