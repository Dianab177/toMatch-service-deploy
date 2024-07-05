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
        Schema::create('aux_recruiters', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname');
           
            $table->string('email')->unique();

            $table->string('company');
            
            $table->unsignedTinyInteger('first_interview')->nullable();
            $table->unsignedTinyInteger('last_interview')->nullable();

            $table->boolean('remote');

            $table->boolean('barcelona')->nullable();
            $table->boolean('madrid')->nullable();
            $table->boolean('asturias')->nullable();
            $table->boolean('sevilla')->nullable();
            $table->boolean('malaga')->nullable();
            $table->boolean('cantabria')->nullable();
            $table->boolean('galicia')->nullable();
            $table->boolean('castilla_y_leon')->nullable();
            
            $table->boolean('php')->nullable();
            $table->boolean('java')->nullable();
            /* $table->string('javascript')->nullable();
            $table->string('react')->nullable(); */
            $table->string('idioma')->nullable();

            $table->string('gender')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_recruiters');
    }
};
