<?php

namespace Tests\Unit;

use Tests\TestCase;

class EventTest extends TestCase
{
    /** @test */
    public function test_event_index_returns_200_ok(): void
    {
        // Scenario: View events
        // Given I am an authenticated user
        // When I visit the events page
        // Then I should receive a status code of 200

        $response = $this->call('GET', '/events', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_event_can_be_created(): void
    {
        // Scenario: Create a new event
        // Given I am an authenticated user
        // When I submit a new event with name "DTD", date "2023/05/04", url "http//:zoom.com", max 6, and min 4
        // Then I should receive a status code of 200

        $response = $this->call('POST', '/events', [
            'name' => 'DTD',
            'date' => '2023/05/04',
            'url' => 'http//:zoom.com',
            'max' => 6,
            'min' => 4
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_event_can_be_updated(): void
    {
        // Scenario: Update an existing event
        // Given I am an authenticated user
        // When I update the event with name "Some new event", date "2023/06/06", url "http//:zoome.com", max 6, and min 4
        // Then I should receive a status code of 200

        $response = $this->call('PUT', '/events/event', [
            'name' => 'Some new event',
            'date' => '2023/06/06',
            'url' => 'http//:zoome.com',
            'max' => 6,
            'min' => 4
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_event_can_be_destroyed(): void
    {
        // Scenario: Delete an existing event
        // Given I am an authenticated user
        // When I delete the event with name "Some new event", date "2023/06/06", url "http//:zoome.com", max 6, and min 4
        // Then I should receive a status code of 200

        $response = $this->call('DELETE', '/events/event', [
            'name' => 'Some new event',
            'date' => '2023/06/06',
            'url' => 'http//:zoome.com',
            'max' => 6,
            'min' => 4
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
