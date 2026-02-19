<?php

namespace App\Actions;

use App\DTOs\PlayerNoteData;
use App\Models\PlayerNote;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;

final class CreatePlayerNote
{
    /**
     * Constructs a new instance of the CreatePlayerNote class.
     *
     * @param PlayerNoteRepositoryInterface $repository The repository to use for creating player notes.
     */
    public function __construct(
        private readonly PlayerNoteRepositoryInterface $repository
    )
    {
    }

    /**
     * Creates a new player note.
     *
     * @param PlayerNoteData $data The data to create the player note with.
     * @return PlayerNote The created player note.
     */
    public function execute(PlayerNoteData $data): PlayerNote
    {
        return $this->repository->create($data);
    }
}
