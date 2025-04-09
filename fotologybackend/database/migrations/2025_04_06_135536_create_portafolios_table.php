<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortafoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portafolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photographer_id'); // Relación con photographers
            $table->string('title');                      // Título del portafolio
            $table->text('description')->nullable();      // Descripción del portafolio
            $table->string('cover_image')->nullable();    // Imagen de portada (opcional)
            $table->timestamps();

            // Relación con photographers
            $table->foreign('photographer_id')->references('id')->on('photographers')->onDelete('cascade');
        });

        // Relación entre portafolios y photographies
        Schema::table('photographies', function (Blueprint $table) {
            $table->unsignedBigInteger('portafolio_id')->nullable(); // Relación con portafolios
            $table->foreign('portafolio_id')->references('id')->on('portafolios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar la relación entre photographies y portafolios
        Schema::table('photographies', function (Blueprint $table) {
            $table->dropForeign(['portafolio_id']);
            $table->dropColumn('portafolio_id');
        });

        Schema::dropIfExists('portafolios');
    }
}