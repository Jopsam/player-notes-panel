<?php

namespace App\Livewire\Players;

use App\Repositories\Contracts\PlayerRepositoryInterface;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    protected string $paginationTheme = 'tailwind';
    
    /**
     * Render the component.
     *
     * @return View
     */
    public function render(PlayerRepositoryInterface $playerRepositoryInterface): View
    {
        return view('livewire.players.index', [
            'players' => $playerRepositoryInterface->paginate(10),
        ])->layout('layouts.app');
    }
}
