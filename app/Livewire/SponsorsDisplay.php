<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Sponsor;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class SponsorsDisplay extends Component
{
    public function render(): View
    {
        return view('livewire.sponsors-display', [
            'sponsors' => Sponsor::query()
                ->get(),
        ]);
    }
}
