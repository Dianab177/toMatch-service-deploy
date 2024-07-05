<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aux_coders', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname');
            $table->string('gender');
            
            $table->string('profile')->nullable();

            $table->string('promocion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('idioma')->nullable();
            $table->string('php')->nullable();
            $table->string('java')->nullable();
            $table->string('javascript')->nullable();
            $table->string('react')->nullable();
            $table->string('ingles_alto')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_coders');
    }
};
