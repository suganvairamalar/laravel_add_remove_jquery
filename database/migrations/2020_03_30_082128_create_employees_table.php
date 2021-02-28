<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->smallInteger('gender');
            $table->date('dob');
            $table->integer('age');
            $table->integer('department_id');
            $table->integer('position_id');
            $table->string('known_technology_id');
            $table->date('join_date');
            $table->string('salary');
            $table->string('id_proof');
            $table->string('prev_office');
            $table->timestamps();
        });
    }

    //'employee_name','gender','dob','age','department_id','position_id','known_technology_id','join_date','salary','id_proof','prev_office'

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
