<?php

namespace App\Actions;

use App\DTOs\CreatePlayerNoteData;
use App\Models\PlayerNote;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;

final class CreatePlayerNoteAction
{
    /**
     * Constructs a new instance of the CreatePlayerNote class.
     *
     * @param PlayerNoteRepositoryInterface $repository The repository to use for creating player notes.
     */
    public function __construct(
        private readonly PlayerNoteRepositoryInterface $playerNoteRepositoryInterface
    )
    {
    }

    /**
     * Creates a new player note.
     *
     * @param CreatePlayerNoteData $data The data to create the player note with.
     * @return PlayerNote The created player note.
     */
    public function execute(CreatePlayerNoteData $data): PlayerNote
    {
        return $this->playerNoteRepositoryInterface->create($data);
    }
}
