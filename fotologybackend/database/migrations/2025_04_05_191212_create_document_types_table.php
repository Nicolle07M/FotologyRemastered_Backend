<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTypesTable extends Migration
{
    public function up(): void
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation')->nullable();
            $table->timestamp('creation_date')->useCurrent(); // Se asigna al crear
            $table->timestamp('update_creation')->nullable()->useCurrentOnUpdate(); // Se actualiza al modificar
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
}
