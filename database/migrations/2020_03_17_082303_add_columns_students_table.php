<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('mother_tongue')->after('address');
            $table->string('known_languages')->after('mother_tongue');
            $table->string('certificates')->after('known_languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('mother_tongue');
            $table->dropColumn('known_languages');
            $table->dropColumn('certificates');
        });
    }
}
