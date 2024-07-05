<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Deshabilitar restricciones de clave foránea
        Schema::disableForeignKeyConstraints();

        // Eliminar tablas específicas o todas las tablas
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        // Añade más tablas si es necesario

        // Habilitar restricciones de clave foránea
        Schema::enableForeignKeyConstraints();
    }
}
