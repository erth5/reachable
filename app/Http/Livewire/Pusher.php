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
                logger('Syntax Fault: ' . $output . $result);
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
        logger('adding ' . $this->newName);
        $newAddress = new Address();

        $name = $this->newName;
        if (parse_url($name, PHP_URL_HOST) == null) {
            if (parse_url($name, PHP_URL_PATH) == null) {
                return redirect()->route('main')->with('error', $name . ' invalid url');
            } else {
                if (substr_count($name, ".") > 1) {
                    /* schneidet den ersten Pfad Teil weg */
                    $newAddress->name = (ltrim(strstr($name, '.'), "."));
                } else {
                    $newAddress->name = $this->standardize($name);
                }
            }
        } else {
            $newAddress->name = $this->standardize($name);
        }

        $newAddress = $this->setStatus($newAddress);
        $newAddress->saveOrFail();

        return redirect()->route('main');
    }

    private function standardize($name)
    {
        $name = str_replace(array('https', 'http', '://', 'www.', '\/'), '', $name);
        return $name;
    }

}
