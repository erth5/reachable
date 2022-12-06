<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;

class Addresser extends Component
{
    /**
     * address Model-Adresse
     * newName Neuer AdressName Eingabe
     * status Verfügbarkeit
     */
    public $address;
    public $newName;
    public $status;

    protected $rules = [
        'newName' => 'required',
    ];

    public function render()
    {
        // echo $this->address . '<br>';
        // echo $this->newName . '<br>';
        // echo $this->status . '<br>';
        // dd('all function values');
        return view('livewire.addresser');
    }

    public function mount()
    {
        // info('mount method call');
        $this->newName = $this->address->name;
    }

    // TODO: muss hier gespeichert werden?
    /**
     * @param [type] $id Identifikator der Addresse
     */
    public function setStatus($address)
    {
        return $address;
    }

    public function update()
    {
        $dbAddress = Address::find($this->address->id); // notwendig?
        info($dbAddress->name . ' change in ' . $this->newName);
        $dbAddress->name = $this->standardize($this->newName);

        /** Status einsehen */
        exec("ping -n 1 " . $this->newName, $output, $result);
        switch ($result) {
            case 0:
                // dd($output);
                $dbAddress->state = 0;
                break;
            case 1:
                $dbAddress->state = 1;
                break;
            case 2:
                info('Syntax Fault: ' . $output, $result);
                $dbAddress->state = 3;
                break;
        }
        $dbAddress->saveOrFail();
        return redirect()->route('main');
    }

    public function delete()
    {
        $address = Address::findOrFail($this->address->id);
        $address->delete();
        return redirect()->route('main')->with('success', 'element removed');
    }

    private function standardize($name)
    {
        $name = str_replace(array('https', 'http', '://', 'www.', '\/'), '', $name);
        return $name;
    }
}
