<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razonsocial'); 
            $table->string('cuit');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('actividad');
            $table->string('observaciones');
            $table->string('cbu');
            $table->integer('fk_ciudad_id')->unsigned();
            $table->foreign('fk_ciudad_id')->references('id')->on('ciudads');
            $table->integer('fk_banco_id')->unsigned();
            $table->foreign('fk_banco_id')->references('id')->on('bancos');            
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('proveedors');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
