<?php

namespace Tests\Unit;

use Tests\TestCase;

class SchoolTest extends TestCase
{
    /** @test */

    public function test_school_index_returns_200_ok(): void
    {

        // Scenario: Retrieve Schools
        // Given I am on the schools page
        // When I make a GET request to '/schools'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/schools', []);
        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test__a_new_school_can_be_created(): void
    {
        // Scenario: Create a new School
        // Given I am on the schools page
        // When I make a POST request to '/schools' with a new school name, province id, latitude and longitude
        // Then the response status code should be 201 Created
        // And the response should include a success message
        // And the response should include the new school data
        // And the new school should be stored in the database

        $response = $this->call('POST', '/schools', [
            'province_id' => '1',
            'name' => 'Asturias',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_school_can_be_updated(): void
    {
        // Scenario: Update a School
        // Given I am on the schools page
        // When I make a PUT request to '/schools/{school}' with a new name, province id, latitude and longitude for the school
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the response should include the updated school data
        // And the updated school data should be stored in the database

        $response = $this->call('PUT', '/schools/school', [
            'province_id' => '1',
            'name' => 'Gijon',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_school_can_be_destroyed(): void
    {
        // Scenario: Delete a School
        // Given I am on the schools page
        // When I make a DELETE request to '/schools/{school}' to delete a school
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the deleted school should be removed from the database

        $response = $this->call('DELETE', '/schools/school', [
            'province_id' => '1',
            'name' => 'Gijon',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
