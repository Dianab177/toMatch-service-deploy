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
        Schema::create('coders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')
                ->references('id')
                ->on('promotions')
                ->onDelete('cascade');

            /* $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onDelete('cascade'); */

            $table->string('name');
            $table->string('lastname');
            $table->string('gender');
            $table->unsignedTinyInteger('years')->nullable();
            $table->string('avaliability')->nullable();
            $table->boolean('remote')->nullable();
           /*  $table->string('email')->unique();
            $table->string('phone')->unique(); */
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('profile')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coders');
    }
};
