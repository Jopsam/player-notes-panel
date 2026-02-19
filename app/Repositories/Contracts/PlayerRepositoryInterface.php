<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    /**
     * Get a paginated list of players.
     *
     * @param int $perPage The number of players to return per page (default is 10).
     * @return LengthAwarePaginator A paginated list of players.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator;

    /**
     * Get a player by their ID.
     *
     * @param int $id The ID of the player to retrieve.
     * @return User|null The player object, or null if not found.
     */
    public function findById(int $id): ?User;
}