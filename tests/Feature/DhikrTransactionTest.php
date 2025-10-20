<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DhikrTransactionTest extends TestCase
{
    use RefreshDatabase; // Clean DB after each test
    public function test_dhikr_creation_uses_transaction()
    {
        // ARRANGE: Create authenticated user
        $user = User::factory()->create();

        // ACT: Create dhikr as authenticated user
        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/dhikrs', [
                'text' => 'Test Dhikr',
                'target_count' => 100
            ]);

        // ASSERT: Verify success + DB record
        $response->assertStatus(201);
        $this->assertDatabaseHas('dhikrs', [
            'text' => 'Test Dhikr',
            'target_count' => 100
        ]);
    }

    public function test_dhikr_update_uses_transaction()
    {
        // Arrange: Create user + dhikr
        $user = User::factory()->create();
        $createResponse = $this->actingAs($user, 'sanctum')
            ->postJson('/api/dhikrs', [
                'text' => 'Original Dhikr',
                'target_count' => 50
            ]);
        $dhikr = json_decode($createResponse->getContent());

        // Act: Update the created dhikr
        $response = $this->actingAs($user, 'sanctum')
            ->putJson("/api/dhikrs/{$dhikr->id}", [
                'text' => 'Updated Dhikr',
                'target_count' => 150
            ]);

        // Assert: Verify success + DB update
        $response->assertStatus(200);
        $this->assertDatabaseHas('dhikrs', [
            'id' => $dhikr->id,
            'text' => 'Updated Dhikr',
            'target_count' => 150
        ]);
    }
    public function test_dhikr_delete_uses_transaction()
    {
        // Arrange: Create user + dhikr
        $user = User::factory()->create();
        $createResponse = $this->actingAs($user, 'sanctum')
            ->postJson('/api/dhikrs', [
                'text' => 'To Delete',
                'target_count' => 10
            ]);
        $dhikr = json_decode($createResponse->getContent());

        // Act: Delete
        $response = $this->actingAs($user, 'sanctum')
            ->deleteJson("/api/dhikrs/{$dhikr->id}");

        // Assert: Verify deletion
        $response->assertStatus(204);
        $this->assertDatabaseMissing('dhikrs', ['id' => $dhikr->id]);
    }
}
