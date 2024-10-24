<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ciudades', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('moneda_local');
        $table->string('simbolo_moneda');
        $table->decimal('tasa_cambio', 10, 4);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudades');
    }
};
