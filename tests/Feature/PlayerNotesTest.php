<?php

namespace Tests\Feature;

use App\Livewire\Players\Notes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PlayerNotesTest extends TestCase
{
    use RefreshDatabase;

    public function test_agent_can_create_player_note()
    {
        $agent = User::factory()->agent()->create();
        $player = User::factory()->player()->create();

        Livewire::actingAs($agent)
            ->test(Notes::class, ['id' => $player->id])
            ->set('note', 'This is a test note')
            ->call('save');

        $this->assertDatabaseHas('player_notes', [
            'player_id' => $player->id,
            'author_id' => $agent->id,
            'note' => 'This is a test note',
        ]);
    }

    public function test_viewer_cannot_create_note_button_or_save_note()
    {
        $viewer = User::factory()->viewer()->create();
        $player = User::factory()->player()->create();

        Livewire::actingAs($viewer)
            ->test(Notes::class, ['id' => $player->id])
            ->assertDontSee('Save Note')
            ->set('note', 'Attempted note')
            ->call('save');

        $this->assertDatabaseMissing('player_notes', [
            'player_id' => $player->id,
            'note' => 'Attempted note',
        ]);
    }
}
