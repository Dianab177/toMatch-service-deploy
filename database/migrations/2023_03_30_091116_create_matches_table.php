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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coder_id');
            $table->foreign('coder_id')
                ->references('id')
                ->on('coders')
                ->onDelete('cascade');

            $table->unsignedBigInteger('recruiter_id');
            $table->foreign('recruiter_id')
                ->references('id')
                ->on('recruiters')
                ->onDelete('cascade');

            $table->decimal('afinity',5,2);
            $table->unsignedInteger('num_match');     
            $table->unsignedTinyInteger('interview');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
