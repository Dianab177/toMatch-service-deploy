<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProvincesTest extends TestCase
{
    /** @test */

    public function test_provinces_index_returns_200_ok(): void
    {
        // Scenario: View a list of provinces
        // Given I am on the provinces page
        // When I visit the "/provinces" URL
        // Then I should receive a 200 OK response

        $response = $this->call('GET', '/provinces', []);

        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test__a_new_province_can_be_created(): void
    {
        // Scenario: Create a new province
        // Given I am on the provinces page
        // When I submit a POST request to "/provinces" with valid data
        // Then a new province should be created
        // And I should receive a 200 OK response

        $response = $this->call('POST', '/provinces', [
            'region_id' => '1',
            'name' => 'Oviedo',
            'lat' => '43.54530',
            'long' => '-5.661930',
            'iso' => 'AS'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_province_can_be_updated(): void
    {
        // Scenario: Update an existing province
        // Given I am on the provinces page
        // When I submit a PUT request to "/provinces/1" with valid data
        // Then the province should be updated
        // And I should receive a 200 OK response

        $response = $this->call('PUT', '/provinces/1', [
            'region_id' => '1',
            'name' => 'Gijon',
            'lat' => '23.54530',
            'long' => '-4.661930',
            'iso' => 'AS'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */

    public function test_province_can_be_destroyed(): void
    {
        // Scenario: Delete an existing province
        // Given I am on the provinces page
        // When I submit a DELETE request to "/provinces/1"
        // Then the province should be deleted
        // And I should receive a 200 OK response

        $response = $this->call('DELETE', '/provinces/1', [
            'region_id' => '1',
            'name' => 'Gijon',
            'lat' => '23.54530',
            'long' => '-4.661930',
            'iso' => 'AS'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
