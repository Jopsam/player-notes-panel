<?php

namespace App\Repositories;

use App\Enums\Roles;
use App\Models\User;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerRepository implements PlayerRepositoryInterface
{
    /**
     * Get a paginated list of players.
     *
     * @param int $perPage The number of players to return per page (default is 10).
     * @return LengthAwarePaginator A paginated list of players.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return User::role(Roles::PLAYER->value)
            ->select(['id', 'name', 'email'])
            ->paginate($perPage);
    }

    /**
     * Get a player by ID.
     *
     * @param int $id The ID of the player to retrieve.
     * @return User|null The player object, or null if not found.
     */
    public function findById(int $id): ?User
    {
        return User::find($id);
    }
}
