<?php

namespace App\DTOs;

final class CreatePlayerNoteData
{
    /**
     * Creates a new instance of the PlayerNoteData class.
     *
     * @param int $playerId The ID of the player that this note belongs to.
     * @param int $authorId The ID of the author of this note.
     * @param string $note The note itself.
     */
    public function __construct(
        public readonly int $playerId,
        public readonly int $authorId,
        public readonly string $note
    )
    {
    }
}
