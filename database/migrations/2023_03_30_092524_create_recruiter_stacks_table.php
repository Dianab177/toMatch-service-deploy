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
        Schema::create('recruiters_stacks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('recruiter_id');
            $table->foreign('recruiter_id')
                ->references('id')
                ->on('recruiters')
                ->onDelete('cascade');

            $table->unsignedBigInteger('stack_id');
            $table->foreign('stack_id')
                ->references('id')
                ->on('stacks')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiters_stacks');
    }
};
