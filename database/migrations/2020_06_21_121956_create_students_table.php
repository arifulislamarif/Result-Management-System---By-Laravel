<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->tinyInteger('user_id');
            $table->string('student_fname');
            $table->string('student_lname');
            $table->string('student_class');
            $table->integer('student_roll');
            $table->string('student_father_name');
            $table->string('student_mother_name');
            $table->string('student_address');
            $table->integer('student_phone');
            $table->string('student_image');
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
