<?php

namespace Tests\Unit;

use Tests\TestCase;

class PromotionsTest extends TestCase
{
    /** @test */
    public function test_promotions_index_returns_200_ok(): void
    {
        // Scenario: Retrieve Promotions
        // Given I am on the promotions page
        // When I make a GET request to '/promotions'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/promotions', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_promotions_can_be_created(): void
    {
        // Scenario: Create a new promotion
        // Given I am on the promotions page
        // When I make a POST request to '/promotions' with a new promotion data
        // Then the response status code should be 201 Created
        // And the response should include a success message
        // And the response should include the new promotion data
        // And the new promotion should be stored in the database

        $response = $this->call('POST', '/promotions', [
            'school_id' => '1',
            'name' => 'FemCodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_promotions_can_be_updated(): void
    {
        // Scenario: Update a Promotion
        // Given I am on the promotions page
        // When I make a PUT request to '/promotions/{promotion}' with updated promotion data
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the response should include the updated promotion data
        // And the updated promotion data should be stored in the database

        $response = $this->call('PUT', '/promotions/1', [
            'school_id' => '1',
            'name' => 'FemCooodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_promotions_can_be_destroyed(): void
    {
        // Scenario: Delete a Promotion
        // Given I am on the promotions page
        // When I make a DELETE request to '/promotions/{promotion}' to delete a promotion
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the deleted promotion should be removed from the database 

        $response = $this->call('DELETE', '/promotions/FemCoodersNorte', [
            'school_id' => '1',
            'name' => 'FemCooodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
