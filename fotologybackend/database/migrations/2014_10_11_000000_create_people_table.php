<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');       // Nombre
            $table->string('last_name');        // Apellido
            $table->string('phone');            // Teléfono
            $table->date('birth_date');         // Fecha de nacimiento
            $table->string('email')->unique(); // Correo electrónico (único)
            $table->unsignedBigInteger('document_type_id'); // Relación con document_types
            $table->string('document_number');  // Número de documento
            $table->string('photo')->nullable(); // Foto (opcional)
            $table->string('address');          // Dirección
            $table->timestamps();

            // Relación con document_types
            $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}