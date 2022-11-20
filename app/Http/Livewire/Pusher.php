<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;

class Pusher extends Component
{
    public $status;
    public $address = null;

    public function render()
    {
        return view('livewire.pusher');
    }

    public function check()
    {
        // wire:keydown="check"
        info('checking address');
        // $status = 2;
        // ...
    }

    /**
     * Speichern und neu laden
     */
    public function store()
    {
        info('adding new address');
        $newAddress = new Address();
        $newAddress->address = $this->address;
        $newAddress->saveOrFail();
        return redirect()->route('main');
    }
}
