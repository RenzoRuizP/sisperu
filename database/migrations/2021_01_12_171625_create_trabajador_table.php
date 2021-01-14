<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//ejecutar la migración
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cargo_id');
            $table->integer('empresa_id');
            $table->integer('sucursal_id');
            $table->boolean('planilla');
            $table->decimal('sueldo', 7, 2);
            $table->smallInteger('horas_trabajo');//semanal 
            $table->smallInteger('tiempo_refrigerio');//minutos de refrigerio por día 
            $table->integer('persona_id');
            $table->softDeletes();
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
        Schema::dropIfExists('trabajadores');
    }
}
