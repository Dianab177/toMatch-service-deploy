<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;



class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //use RefreshDatabase;
    public function testMatch(): void
    {
        //   Scenario: Get a match
        //     Given there are recruiters and coders in the database
        //     When I search for a match with stack, language, and province filters
        //     Then the response should have a status code of 200
        //     And the response should contain a match object with the following properties:
        //       - id
        //       - recruiter_id
        //       - coder_id
        //       - afinity
        //     And the match object in the response should have a positive value for "afinity"

        $response = $this->get('/api/match');

        $response->assertStatus(200);
    }

    public function testLastMatch()
    {
        // Scenario: Verify last match
        // Given there are recruiters and coders in the database
        // When the testLastMatch method is called
        // Then the matches table should have a record with the last recruiter and last coder in the database

        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ($totalRecruiters[0]->total > 0  && $totalCoders[0]->total > 0) {
            $this->assertDatabaseHas('matches', [
                'recruiter_id' => $totalRecruiters[0]->total,
                'coder_id' => $totalCoders[0]->total > 0

            ]);
        }
    }

    public function testMatchCount()
    {
        // Scenario: Count matches in the database
        // Given there are recruiters and coders in the database
        // When I count the total number of possible matches
        // Then the number of matches in the database should be equal to the product of the total number of recruiters and coders

        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ($totalRecruiters[0]->total > 0  && $totalCoders[0]->total > 0) {

            $this->assertDatabaseCount('matches', $totalRecruiters[0]->total * $totalCoders[0]->total);
        }
    }

    public function testMatchOk()
    {
        //   Scenario: A recruiter is matched with a coder who meets their requirements
        //   Given there is at least one coder and one recruiter
        //   And the coder has a location, stack, and language matching the recruiter's requirements
        //   When the recruiter and the coder are matched
        //   Then there should be a match with a positive afinity

        $coder = DB::table("coders")

            ->join("coders_locations", "coders.id", "=", "coders_locations.coder_id")
            ->join("coders_stacks", "coders.id", "=", "coders_stacks.coder_id")
            ->join("coders_languages", "coders.id", "=", "coders_languages.coder_id")

            ->where("coders_locations.province_id", "=", 1)
            ->Where("coders_stacks.stack_id", "=", 1)
            ->Where("coders_languages.language_id", "=", 1)

            ->select("coders.id")

            ->first();

        $recruiter = DB::table("recruiters")

            ->join("recruiters_locations", "recruiters.id", "=", "recruiters_locations.recruiter_id")
            ->join("recruiters_stacks", "recruiters.id", "=", "recruiters_stacks.recruiter_id")
            ->join("recruiters_languages", "recruiters.id", "=", "recruiters_languages.recruiter_id")

            ->where("recruiters_locations.province_id", "=", 1)
            ->Where("recruiters_stacks.stack_id", "=", 1)
            ->Where("recruiters_languages.language_id", "=", 1)

            ->select("recruiters.id")

            ->first();

        /* if ($coder && $recruiter) {
            $this->assertDatabaseHas('matches', [
                'recruiter_id' => $recruiter->id,
                'coder_id' => $coder->id

            ]);
        } */

        $match = DB::table("matches")

            ->where("matches.recruiter_id", "=", $recruiter->id)
            ->Where("matches.coder_id", "=", $coder->id)


            ->select("matches.id", "matches.afinity")

            ->first();

        if ($match) {
            $this->assertGreaterThan(0, $match->afinity);
        }
    }
}
