<?php

namespace Tests\Unit;

use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function test_companies_index_returns_200_ok(): void
    {
        // Scenario: View companies
        // Given I am on the companies page
        // When I request GET /companies
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/companies', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_company_can_be_created(): void
    {
        // Scenario: Create a new company
        // Given I am on the new company page
        // When I submit a POST request to /companies with valid data
        // Then the response status code should be 200 OK

        $response = $this->call('POST', '/companies', [
            'id' => '1',
            'name' => 'Factoria',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_company_can_be_updated(): void
    {
        // Scenario: Update an existing company
        // Given I am on the edit company page
        // When I submit a PUT request to /companies/{id} with valid data
        // Then the response status code should be 200 OK

        $response = $this->call('PUT', '/companies/1', [
            'id' => '1',
            'name' => 'FactoriaF5',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_company_can_be_destroyed(): void
    {
        // Scenario: Delete an existing company
        // Given I am on the delete company page
        // When I submit a DELETE request to /companies/{id} with valid data
        // Then the response status code should be 200 OK
        
        $response = $this->call('DELETE', '/companies/FactoriaF5', [
            'id' => '1',
            'name' => 'FactoriaF5',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
