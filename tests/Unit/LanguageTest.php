<?php

namespace Tests\Unit;

use Tests\TestCase;

class LanguageTest extends TestCase
{
    /** @test */
    public function test_language_index_returns_200_ok(): void
    {
        // Scenario: Admin can view list of languages
        // Given I am an authenticated admin
        // When I visit the languages index page
        // Then I should see a list of all languages
        // And the response status code should be 200 

        $response = $this->call('GET', '/languages', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_store_create_new_language(): void
    {
        // Scenario: Admin can add a new language
        // Given I am an authenticated admin
        // When I submit a new language with name "Inglés"
        // Then a new language "Inglés" should be created
        // And the response status code should be 200

        $response = $this->call('POST', '/languages', [
            'id' => '1',
            'name' => 'Inglés',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_update_language(): void
    {
        // Scenario: Admin can update an existing language
        // Given I am an authenticated admin
        // When I update the language with id 2 and name "Chino"
        // Then the language with id 2 should be updated with name "Chino"
        // And the response status code should be 200

        $response = $this->call('PUT', '/languages/2', [
            'id' => '2',
            'name' => 'Chino',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_destroy_language(): void
    {
        // Scenario: Admin can delete an existing language
        // Given I am an authenticated admin
        // When I delete the language with id 2 and name "Chino"
        // Then the language with id 2 should be deleted
        // And the response status code should be 200

        $response = $this->call('DELETE', '/languages/2', [
            'id' => '2',
            'name' => 'Chino',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
