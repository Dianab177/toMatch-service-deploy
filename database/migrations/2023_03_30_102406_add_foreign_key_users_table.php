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
        Schema::table('users', function (Blueprint $table) {
            
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')
                ->references('id')
                ->on('promotions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
           // $table->dropForeign('products_category_id_foreign');
        });
    }




};
