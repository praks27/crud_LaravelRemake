<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
        //
        $table->id();
        $table->string('name', 50 );
        $table->date('date_birth');
        $table->enum('gender', ['male','female']);
        $table->text('address');
        //menggunakan nama major_id itu untuk menunjukan nama table yang akan diganti dan id untuk menunjakn kolom yang akan diganti
        $table->integer('major_id');
        // $table->foreign('major_id')->references('id')->on('students');
        //$table->string('major')->nullabel();
        $table->timestamps();//untuk mengetahui kapan di update dan kapan di buat

        //relationship
        // $table->foreign('major_id')->references('id')->on('majors');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
