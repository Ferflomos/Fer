<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('ciudades')) {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('moneda_local');
            $table->string('simbolo_moneda');
            $table->decimal('tasa_cambio', 10, 6);
            $table->timestamps();
        });
    }
}


    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
