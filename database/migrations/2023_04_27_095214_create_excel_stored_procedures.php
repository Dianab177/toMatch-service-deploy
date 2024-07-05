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
        DB::unprepared('DROP PROCEDURE IF EXISTS getPivotRecruiters;');

        DB::unprepared("
            CREATE PROCEDURE getPivotRecruiters( )
            BEGIN
               SELECT  recruiters.id, recruiters.name AS nameRecruiter, 
                aux_recruiters.barcelona,
                aux_recruiters.madrid ,
                aux_recruiters.asturias ,
                aux_recruiters.sevilla ,
                aux_recruiters.malaga ,
                aux_recruiters.cantabria ,
                aux_recruiters.galicia ,
                aux_recruiters.castilla_y_leon,
                aux_recruiters.php ,
                aux_recruiters.java ,
                aux_recruiters.idioma
                     
                FROM recruiters
                JOIN aux_recruiters 
                    ON recruiters.name = aux_recruiters.name AND recruiters.lastname = aux_recruiters.lastname  
                ;
            END;
        ");

        DB::unprepared('DROP PROCEDURE IF EXISTS storeRecruiterLocation;');

        DB::unprepared('
            CREATE PROCEDURE storeRecruiterLocation(
                IN id_recruiter INT,
                IN id_province INT
            )
            BEGIN
                INSERT INTO recruiters_locations (recruiter_id, province_id, created_at, updated_at) 
                VALUES (id_recruiter, id_province, NULL, NULL);
                
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS storeRecruiterStack;');

        DB::unprepared('
            CREATE PROCEDURE storeRecruiterStack(
                IN id_recruiter INT,
                IN id_stack INT
            )
            BEGIN
                INSERT INTO recruiters_stacks (recruiter_id, stack_id, created_at, updated_at) 
                VALUES (id_recruiter, id_stack, NULL, NULL);
                
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS storeRecruiterLanguage;');

        DB::unprepared('
            CREATE PROCEDURE storeRecruiterLanguage(
                IN id_recruiter INT,
                IN id_language INT
            )
            BEGIN
                INSERT INTO recruiters_languages (recruiter_id, language_id, created_at, updated_at) 
                VALUES (id_recruiter, id_language, NULL, NULL);
                
            END;
        ');
        

         
        DB::unprepared('DROP PROCEDURE IF EXISTS getPivotCoders;');

        DB::unprepared("
            CREATE PROCEDURE getPivotCoders( )
            BEGIN
     
            SELECT  coders.id, coders.name AS nameCoder, 
                
                aux_coders.ubicacion,

                aux_coders.php ,
                aux_coders.java ,
                aux_coders.javascript ,
                aux_coders.react ,

                aux_coders.ingles_alto
                     
                FROM coders
                JOIN aux_coders
                    ON coders.name = aux_coders.name AND coders.lastname = aux_coders.lastname  
                ;
            END;
        ");

        DB::unprepared('DROP PROCEDURE IF EXISTS storeCoderLocation;');

        DB::unprepared('
            CREATE PROCEDURE storeCoderLocation(
                IN id_coder INT,
                IN id_province INT
            )
            BEGIN
                INSERT INTO coders_locations (coder_id, province_id, created_at, updated_at) 
                VALUES (id_coder, id_province, NULL, NULL);
                
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS storeCoderStack;');

        DB::unprepared('
            CREATE PROCEDURE storeCoderStack(
                IN id_coder INT,
                IN id_stack INT
            )
            BEGIN
                INSERT INTO coders_stacks (coder_id, stack_id, created_at, updated_at) 
                VALUES (id_coder, id_stack, NULL, NULL);
                
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS storeCoderLanguage;');

        DB::unprepared('
            CREATE PROCEDURE storeCoderLanguage(
                IN id_coder INT,
                IN id_language INT
            )
            BEGIN
                INSERT INTO coders_languages (coder_id, language_id, created_at, updated_at) 
                VALUES (id_coder, id_language, NULL, NULL);
                
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excel_stored_procedures');
    }
};
