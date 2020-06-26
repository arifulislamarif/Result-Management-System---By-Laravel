<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('student_name');
            $table->string('student_address');
            $table->string('student_father_name');
            $table->string('student_mother_name');
            $table->string('student_image');
            $table->string('exam_type');
            $table->string('student_class');
            $table->integer('student_roll');
            $table->integer('year');
            $table->string('month');
            $table->integer('bangla');
            $table->integer('english');
            $table->integer('math');
            $table->integer('religion');
            $table->integer('total_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
