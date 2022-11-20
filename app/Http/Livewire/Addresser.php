<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;

class Addresser extends Component
{
    /**
     * address id for view
     * newAddress input from gui
     * @var [type]
     */
    public $address;
    public $newAddress;
    public $status;

    public function render()
    {
        return view('livewire.addresser');
    }

    public function setStatus($id)
    {
        info('state change');
        if ($address = Address::find($id)) {
            $this->status == $address->state;
        }
    }

    public function update()
    {
        // dd($this->address);
        info('address update');
        // $address = Address::findOrFail($this->address->id);
        $this->address->address = $this->newAddress;
        // dd("ping -c 1 " . $this->address->address);
        /** Status einsehen */
        exec("ping -n 1 " . $this->address->address, $output, $result);
        // dd($output);
        switch ($result) {
            case 0:
                $this->address->state = 0;
                break;
            case 1:
                $this->address->state = 1;
                break;
            case 2:
                dd('Syntaxfehler');
                break;
        }
        $this->address->saveOrFail();
    }
}
