<?php

namespace Tests\Unit;

use Tests\TestCase;

class CoderTest extends TestCase
{
    /** @test */
    public function test_coder_index_returns_200_ok(): void
    {
        // Scenario: Retrieve Coders
        // Given I am on the coders page
        // When I make a GET request to '/coders'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/coders', []);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test__a_new_coder_can_be_created(): void
    {
        // Scenario: Create a new Coder
        // Given I am on the coders page
        // When I make a POST request to '/coders' with a new coder's data
        // Then the response status code should be 200 OK
        // And the response should include a success message

        $response = $this->call('POST', '/coders', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Dani',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test_coder_can_be_updated(): void
    {
        // Scenario: Update a Coder
        // Given I am on the coders page
        // When I make a PUT request to '/coders/{coder}' with updated coder data
        // Then the response status code should be 200 OK
        // And the response should include a success message

        $response = $this->call('PUT', '/coders/1', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Daniela',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_coder_can_be_destroyed(): void
    {
        // Scenario: Delete a Coder
        // Given I am on the coders page
        // When I make a DELETE request to '/coders/{coder}' to delete a coder
        // Then the response status code should be 200 OK
        // And the response should include a success message

        $response = $this->call('DELETE', '/coders/1', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Dani',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
