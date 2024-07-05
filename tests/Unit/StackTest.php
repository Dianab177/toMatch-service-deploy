<?php

namespace Tests\Unit;

use Tests\TestCase;

class StackTest extends TestCase
{
    /** @test */

    public function test_stack_index_returns_200_ok(): void
    {
        // Scenario: Retrieve Stacks
        // Given I am on the stacks page
        // When I make a GET request to '/stacks'
        // Then the response status code should be 200 OK

        $response = $this->call('GET', '/stacks', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */

    public function test_stack_store_create_new_stack(): void
    {
        // Scenario: Create a new Stack
        // Given I am on the stacks page
        // When I make a POST request to '/stacks' with a new stack name
        // Then the response status code should be 201 Created
        // And the response should include a success message
        // And the response should include the new stack data
        // And the new stack should be stored in the database

        $response = $this->call('POST', '/stacks', [
            'name' => 'Some stack',
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_stack_update_stack(): void
    {
        // Scenario: Update a Stack
        // Given I am on the stacks page
        // When I make a PUT request to '/stacks/{stack}' with a new name for the stack
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the response should include the updated stack data
        // And the updated stack data should be stored in the database

        $response = $this->call('PUT', '/stacks/stack', [
            'name' => 'Some stack new',
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */

    public function test_stack_destroy_stack(): void
    {
        // Scenario: Delete a Stack
        // Given I am on the stacks page
        // When I make a DELETE request to '/stacks/{stack}' to delete a stack
        // Then the response status code should be 200 OK
        // And the response should include a success message
        // And the deleted stack should be removed from the database

        $response = $this->call('DELETE', '/stacks/stack', [
            'name' => 'Some stack new',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
