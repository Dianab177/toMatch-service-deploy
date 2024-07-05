<?php
namespace Tests\Feature;
use App\Models\Stack;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class StackControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testCanCreateStack()
    {

        // Scenario: Create a stack
        // When I create a stack with name "Test Stack"
        // Then the response should have a status code of 200
        // And the response should contain the message "Stack created successfully"
        // And the response should contain a stack object with the following properties:
        //     - id
        //     - name
        //     - created_at
        //     - updated_at
        // And the stack object in the response should have the following values:
        //     | name        | Test Stack |


        $stackData = [
            'name' => 'Test Stack'
        ];
        $response = $this->postJson('/api/stacks', $stackData);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack created successfully',
                'stack' => $stackData
            ]);
    }
    /** @test */
    public function testCanGetStack()
    {
        // Scenario: Get a stack
        // Given there is a stack in the database
        // When I request the stack with ID "1"
        // Then the response should have a status code of 200
        // And the response should contain the message "Stack details"
        // And the response should contain a stack object with the following properties:
        //     - id
        //     - name
        //     - created_at
        //     - updated_at
        // And the stack object in the response should have the following values:
        //     | id   | 1          |
        //     | name | Test Stack |



        $stack = Stack::factory()->create();
        $response = $this->getJson("/api/stacks/{$stack->id}");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack details',
                'stack' => $stack->toArray()
            ]);
    }
    /** @test */
    public function testCanUpdateStack()
    {
        // Scenario: Update a stack
        // Given there is a stack in the database
        // When I update the stack with ID "1" and name "Updated Stack"
        // Then the response should have a status code of 200
        // And the response should contain the message "Stack updated successfully"
        // And the response should contain a stack object with the following properties:
        //     - id
        //     - name
        //     - created_at
        //     - updated_at
        // And the stack with ID "1" in the database should have the following values:
        //     | id   | 1             |
        //     | name | Updated Stack |


        $stack = Stack::factory()->create();
        $stackData = [
            'name' => 'Updated Stack'
        ];


        $response = $this->putJson("/api/stacks/{$stack->id}", $stackData);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack updated successfully',
                'stack' => $stackData
            ]);
        $this->assertDatabaseHas('stacks', $stackData);
    }
    /** @test */
    public function testCanDeleteStack()
    {
        // Scenario: Delete a stack
        // Given there is a stack in the database
        // When I delete the stack with ID "1"
        // Then the response should have a status code of 200
        // And the response should contain the message "Stack delete successfully"
        // And the response should contain a stack object with the following properties:
        //     - id
        //     - name
        //     - created_at
        //     - updated_at
        // And the stack with ID "1" should no longer exist in the database


        $stack = Stack::factory()->create();
        $response = $this->deleteJson("/api/stacks/{$stack->id}");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack delete successfully',
                'stack' => $stack->toArray()
            ]);
        $this->assertDatabaseMissing('stacks', $stack->toArray());
    }
    
}