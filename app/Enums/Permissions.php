<?php

namespace App\Enums;

enum Permissions: string
{
    case VIEW_PLAYER_NOTES = 'view_player_notes';
    case CREATE_PLAYER_NOTES = 'create_player_notes';

    /**
     * Get the label for the role.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::VIEW_PLAYER_NOTES => __('view_player_notes'),
            self::CREATE_PLAYER_NOTES => __('create_player_notes'),
        };
    }
}