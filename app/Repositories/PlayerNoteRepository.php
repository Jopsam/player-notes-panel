<?php

namespace App\Repositories;

use App\DTOs\CreatePlayerNoteData;
use App\Models\PlayerNote;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerNoteRepository implements PlayerNoteRepositoryInterface
{
    /**
     * Get a paginated list of player notes for a given player ID.
     *
     * @param int $playerId The ID of the player to get notes for.
     * @param int $perPage The number of notes to return per page (default is 10).
     * @return LengthAwarePaginator A paginated list of player notes.
     */
    public function paginateByPlayer(int $playerId, int $perPage = 10): LengthAwarePaginator
    {
        return PlayerNote::with('author')
            ->where('player_id', $playerId)
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Create a new player note.
     *
     * @param CreatePlayerNoteData $data The data to create the player note with.
     * @return PlayerNote The created player note.
     */
    public function create(CreatePlayerNoteData $data): PlayerNote
    {
        return PlayerNote::create([
            'player_id' => $data->playerId,
            'author_id' => $data->authorId,
            'note' => $data->note,
        ]);
    }
}