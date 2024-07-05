<?php

namespace Tests\Unit;

use Tests\TestCase;

class RecruiterTest extends TestCase
{
    /** @test */

    public function test_recruiter_index_returns_200_ok(): void
    {
        // Scenario: Retrieve Recruiters
        // Given I am on the recruiters page
        // When I make a GET request to '/recruiters'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/recruiters', []);

        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test__a_new_recruiter_can_be_created(): void
    {
        // Scenario: Create a new Recruiter
        // Given I am on the recruiters page
        // When I make a POST request to '/recruiters' with a new recruiter's data
        // Then the response status code should be 201 Created
        // And the response should include a success message
        // And the response should include the new recruiter's data
        // And the new recruiter should be stored in the database

        $response = $this->call('POST', '/recruiters', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Fran',
            'charge' => 'recruiter',
            'remote' => '1',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_recruiter_can_be_updated(): void
    {
        // Scenario: Update a Recruiter
        // Given I am on the recruiters page
        // When I make a PUT request to '/recruiters/{recruiter}' with updated recruiter data
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the response should include the updated recruiter data
        // And the updated recruiter data should be stored in the database


        $response = $this->call('PUT', '/recruiters/1', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Franciso',
            'charge' => 'Recruiter',
            'remote' => '0',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_recruiter_can_be_destroyed(): void
    {
        // Scenario: Delete a Recruiter
        // Given I am on the recruiters page
        // When I make a DELETE request to '/recruiters/{recruiter}' to delete a recruiter
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the deleted recruiter should be removed from the database

        $response = $this->call('DELETE', '/recruiters/1', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Franciso',
            'charge' => 'Recruiter',
            'remote' => '0',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
