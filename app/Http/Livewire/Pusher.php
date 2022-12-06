<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;

class Pusher extends Component
{
    public $newName;

    public function render()
    {
        return view('livewire.pusher');
    }

    public function setStatus($address)
    {
        // wire:keydown="check"
        exec("ping -n 1 " . $this->newName, $output, $result);
        // dd($output);
        switch ($result) {
            case 0:
                $address->state = 0;
                break;
            case 1:
                $address->state = 1;
                break;
            case 2:
                info('Syntax Fault: ' . $output, $result);
                $address->state = 3;
                break;
        }
        return $address;
    }

    /**
     * Speichern und neu laden
     */
    public function store()
    {
        info('adding ' . $this->newName);
        $newAddress = new Address();
        $newAddress->name = $this->standardize($this->newName);
        $newAddress = $this->setStatus($newAddress);
        $newAddress->saveOrFail();

        return redirect()->route('main');
    }

    private function standardize($name)
    {
        $name = str_replace(array('https//:', 'http//:'), '', $name);
        return $name;
    }
}
