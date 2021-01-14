<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //ejecutar la migración
    {
        Schema::table('sucursales', function (Blueprint $table) {
            $table->integer('tipo_sucursal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // cuando se hace el rollback
    {
        Schema::table('sucursales', function (Blueprint $table) {
            $table->dropColumn('tipo_sucursal');
        });
    }
}



