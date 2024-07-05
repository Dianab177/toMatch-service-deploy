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
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllRecruitersToSchedule;');

        DB::unprepared('
            CREATE PROCEDURE getAllRecruitersToSchedule(
                IN numMatch INT
            )
            BEGIN
                SELECT recruiters.company_id, companies.priority, recruiters.id, recruiters.name, recruiters.first_interview, recruiters.last_interview
                FROM recruiters
                JOIN matches
                    ON recruiters.id = matches.recruiter_id
                JOIN companies
                    ON recruiters.company_id = companies.id
                WHERE matches.num_match = numMatch 
                GROUP BY recruiters.id 
                ORDER BY companies.priority, companies.id, recruiters.id;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getMaxMinCoderInterview;');

        DB::unprepared('
            CREATE PROCEDURE getMaxMinCoderInterview(
                IN id_event INT
            )
            BEGIN
                SELECT events.max AS maxInterviewCoder, events.min AS minInterviewCoder
                FROM events
                WHERE events.id = id_event;
            END;
        ');


        DB::unprepared('DROP PROCEDURE IF EXISTS getMatchesRecruiterCoders;');

        DB::unprepared('
            CREATE PROCEDURE getMatchesRecruiterCoders(
                IN numMatch INT,
                IN id_recruiter INT
            )
            BEGIN
                SELECT coders.id, coders.name, matches.afinity 
                FROM matches
                
                JOIN coders 
                    ON matches.coder_id = coders.id 
                
                WHERE matches.num_match = numMatch 
                    AND matches.recruiter_id = id_recruiter
                    AND matches.afinity > 0
                    AND matches.interview = 0
                    
                ORDER BY matches.afinity DESC ;
            END;
        ');

        

        DB::unprepared('DROP PROCEDURE IF EXISTS getTotalCoderSchedule;');

        DB::unprepared('
            CREATE PROCEDURE getTotalCoderSchedule(
                IN numMatch INT,
                IN id_coder INT
            )
            BEGIN
                SELECT COUNT(coder_id) AS total  FROM matches 
                WHERE  matches.num_match = numMatch 
                    AND coder_id = id_coder
                    AND interview > 0;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderSchedule;');

        DB::unprepared('
            CREATE PROCEDURE getCoderSchedule(
                IN numMatch INT,
                IN id_coder INT,
                IN job_interview INT
            )
            BEGIN
                SELECT coder_id FROM matches 
                WHERE matches.num_match = numMatch 
                    AND coder_id = id_coder 
                    AND interview = job_interview  ;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCoderCompanySchedule;');

        DB::unprepared('
            CREATE PROCEDURE getCoderCompanySchedule(
                IN numMatch INT,
                IN id_coder INT,
                IN id_company INT
            )
            BEGIN
                SELECT matches.coder_id 
                FROM matches 
                JOIN recruiters 
                    ON matches.recruiter_id = recruiters.id 
                JOIN companies 
                    ON recruiters.company_id = companies.id
                WHERE matches.num_match = numMatch 
                    AND matches.coder_id = id_coder 
                    AND interview > 0
                    AND companies.id = id_company  ;
            END;
        ');

  
        DB::unprepared('DROP PROCEDURE IF EXISTS storeSchedule;');

        DB::unprepared('
            CREATE PROCEDURE storeSchedule(
                IN id_coder INT,
                IN id_recruiter INT,
                IN job_interview INT
            )
            BEGIN
                UPDATE matches SET interview = job_interview
                WHERE coder_id = id_coder AND  recruiter_id = id_recruiter;
                
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getSchedulerRecruiters;');

        DB::unprepared('
            CREATE PROCEDURE getSchedulerRecruiters(
                IN numMatch INT
            )
            BEGIN
                SELECT events.name AS nameEvent, companies.name AS nameCompany, recruiters.name AS nameRecruiter, coders.name AS nameCoder, matches.afinity, matches.interview 
                FROM matches
                JOIN recruiters 
                    ON matches.recruiter_id = recruiters.id 
                JOIN companies 
                    ON recruiters.company_id = companies.id     
                JOIN coders 
                    ON matches.coder_id = coders.id 
                JOIN events 
                    ON coders.event_id = events.id      
                WHERE matches.num_match = numMatch 
                    AND matches.interview > 0
                ORDER BY recruiters.company_id, recruiters.id, matches.interview;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getSchedulerCoders;');

        DB::unprepared('
            CREATE PROCEDURE getSchedulerCoders(
                IN numMatch INT
            )
            BEGIN
                SELECT events.name AS nameEvent, companies.name AS nameCompany, recruiters.name AS nameRecruiter, coders.name AS nameCoder, matches.afinity, matches.interview 
                FROM matches
                JOIN recruiters 
                    ON matches.recruiter_id = recruiters.id 
                JOIN companies 
                    ON recruiters.company_id = companies.id     
                JOIN coders 
                    ON matches.coder_id = coders.id 
                JOIN events 
                    ON coders.event_id = events.id      
                WHERE matches.num_match = numMatch 
                    AND matches.interview > 0
                ORDER BY coders.id, matches.interview;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getCountScheduleXCoder;');

        DB::unprepared("
            CREATE PROCEDURE getCountScheduleXCoder(
                IN numMatch INT
            )
            BEGIN
                SELECT matches.coder_id AS idCoder, COUNT(matches.interview) AS maxInterview
                FROM matches
                WHERE matches.num_match = numMatch
                 AND  matches.interview > 0
                GROUP BY  matches.coder_id 
                ORDER BY matches.coder_id, matches.interview;
            END;
        ");

        DB::unprepared('DROP PROCEDURE IF EXISTS getCountScheduleXRecruiter;');

        DB::unprepared("
            CREATE PROCEDURE getCountScheduleXRecruiter(
                IN numMatch INT
            )
            BEGIN
                SELECT matches.recruiter_id  AS idRecruiter, COUNT(matches.interview) AS maxInterview
                FROM matches
                WHERE matches.num_match = numMatch
                 AND  matches.interview > 0
                GROUP BY  matches.recruiter_id  
                ORDER BY matches.recruiter_id , matches.interview;
            END;
        ");
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_stored_procedures');
    }
};
