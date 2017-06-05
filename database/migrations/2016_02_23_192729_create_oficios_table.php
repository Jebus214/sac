<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficios', function (Blueprint $table) {

            $table->increments('id');
            $table->string('no_oficio');
            $table->string('remitente_c');
            $table->string('remitente_e');   
            $table->integer('remitente_id');
            $table->integer('destinatario_id');
            $table->integer('autor_id');
            $table->integer('user_id');
            $table->date('fecha_emision'); 
            $table->integer('recibido');
            $table->integer('status');
            $table->string('seguimiento');
            $table->string('contestacion');
            $table->string('asunto');
            $table->string('archivo');
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
        Schema::drop('oficios');
    }
}
