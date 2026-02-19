<?php

namespace App\Repositories\Contracts;

use App\DTOs\PlayerNoteData;
use App\Models\PlayerNote;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PlayerNoteRepositoryInterface
{
    /**
     * Get a paginated list of player notes for a given player ID.
     *
     * @param int $playerId The ID of the player to get notes for.
     * @param int $perPage The number of notes to return per page (default is 10).
     * @return LengthAwarePaginator A paginated list of player notes.
     */
    public function getByPlayer(int $playerId, int $perPage = 10): LengthAwarePaginator;

    /**
     * Create a new player note.
     *
     * @param PlayerNoteData $data The data to create the player note with.
     * @return PlayerNote The created player note.
     */
    public function create(PlayerNoteData $data): PlayerNote;
}
