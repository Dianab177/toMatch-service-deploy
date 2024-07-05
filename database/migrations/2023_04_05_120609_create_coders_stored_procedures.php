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
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllCoders;');

        DB::unprepared('
            CREATE PROCEDURE getAllCoders()
            BEGIN
                SELECT * FROM coders;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS countCoders;');

        DB::unprepared('
            CREATE PROCEDURE countCoders()
            BEGIN
                SELECT COUNT(id) AS total FROM coders;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderStack;');

        DB::unprepared('
            CREATE PROCEDURE getCoderStack(
                IN id_coder INT,
                IN id_stack INT
            )
            BEGIN
                SELECT stack_id FROM coders_stacks WHERE coder_id = id_coder and stack_id = id_stack  ;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderLanguages;');

        DB::unprepared('
            CREATE PROCEDURE getCoderLanguages(
                IN id_coder INT
            )
            BEGIN
                SELECT language_id 
                FROM coders 
                JOIN coders_languages 
                on coders.coder_id = coders_languages.coder_id
                WHERE coders.coder_id =id_coder ;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderLanguage;');

        DB::unprepared('
            CREATE PROCEDURE getCoderLanguage(
                IN id_coder INT,
                IN id_language INT
            )
            BEGIN
                SELECT language_id FROM coders_languages WHERE coder_id = id_coder and language_id = id_language  ;
            END;
        ');

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coders_stored_procedures');
    }
};
