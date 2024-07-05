<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderLocation;');

        DB::unprepared('
            CREATE PROCEDURE getCoderLocation(
                IN id_coder INT,
                IN id_province INT
            )
            BEGIN
                SELECT province_id FROM coders_locations WHERE coder_id = id_coder and province_id = id_province ;
            END;
        ');

        
        DB::unprepared('DROP PROCEDURE IF EXISTS getRecruiterLocations;');

        DB::unprepared('
            CREATE PROCEDURE getRecruiterLocations(
                IN id_recruiter INT
            )
            BEGIN
                SELECT province_id FROM recruiters_locations WHERE recruiter_id = id_recruiter ;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations_stored_procedures');
    }
};
