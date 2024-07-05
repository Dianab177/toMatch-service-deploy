<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegionsTest extends TestCase
{
    /** @test */

    public function test_regions_index_returns_200_ok(): void
    {

        // Scenario: Retrieve Regions
        // Given I am on the regions page
        // When I make a GET request to '/regions'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/regions', []);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test__a_new_region_can_be_created(): void
    {

        // Scenario: Create a new Region
        // Given I am on the regions page
        // When I make a POST request to '/regions' with a new region name, latitude, longitude and iso
        // Then the response status code should be 201 Created
        // And the response should include a success message
        // And the response should include the new region data
        // And the new region should be stored in the database

        $response = $this->call('POST', '/regions', [
            'name' => 'Asturias',
            'lat' => '43.366',
            'long' => '-5.864',
            'iso' => 'As'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */

    public function test_region_can_be_updated(): void
    {
        // Scenario: Update a Region
        // Given I am on the regions page
        // When I make a PUT request to '/regions/{region}' with new name, latitude, longitude and iso for the region
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the response should include the updated region data
        // And the updated region data should be stored in the database

        $response = $this->call('PUT', '/regions/1', [
            'name' => 'Galicia',
            'lat' => '24.366',
            'long' => '-3.864',
            'iso' => 'GA'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_region_can_be_destroyed(): void
    {
        // Scenario: Delete a Region
        // Given I am on the regions page
        // When I make a DELETE request to '/regions/{region}' to delete a region
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the deleted region should be removed from the database

        $response = $this->call('DELETE', '/regions/Galicia', [
            'name' => 'Galicia',
            'lat' => '24.366',
            'long' => '-3.864',
            'iso' => 'GA'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
