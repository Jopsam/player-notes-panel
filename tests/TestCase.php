<?php

namespace Tests;

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => Roles::PLAYER->value]);
        $agent = Role::create(['name' => Roles::AGENT->value]);
        $viewer = Role::create(['name' => Roles::VIEWER->value]);
        
        // We use firstOrCreate here to avoid creating duplicate permissions if the seeder is run multiple times.
        $viewPlayerNotePermission = Permission::firstOrCreate(['name' => Permissions::VIEW_PLAYER_NOTES->value]);
        $createPlayerNotePermission = Permission::firstOrCreate(['name' => Permissions::CREATE_PLAYER_NOTES->value]);

        $agent->givePermissionTo([$viewPlayerNotePermission, $createPlayerNotePermission]);
        $viewer->givePermissionTo($viewPlayerNotePermission);
    }
}
