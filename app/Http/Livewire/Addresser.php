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
        // logger('mount method call');
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
        logger($dbAddress->name . ' change in ' . $this->newName);

        $name = $this->newName;
        if (parse_url($name, PHP_URL_HOST) == null) {
            if (parse_url($name, PHP_URL_PATH) == null) {
                return redirect()->route('main')->with('error', $name . ' invalid url');
            } else {
                exec("ping -n 1 " . $dbAddress->name, $output, $result);
                if ($result != 0) {
                    $dbAddress->name = $this->standardize($name);
                } else {
                    if (substr_count($name, ".") > 1) {
                        /* schneidet den ersten Pfad Teil weg */
                        $dbAddress->name = (ltrim(strstr($name, '.'), "."));
                    } else {
                        $dbAddress->name = $this->standardize($name);
                    }
                }
            }
        } else {
            $dbAddress->name = $this->standardize($name);
        }

        /** Status einsehen */
        exec("ping -n 1 " . $dbAddress->name, $output, $result);
        switch ($result) {
            case 0:
                // dd($output);
                $dbAddress->state = 0;
                break;
            case 1:
                $dbAddress->state = 1;
                break;
            case 2:
                logger('Syntax Fault: ' . $output .  $result);
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
    private function validateUrl($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo "$url is a valid URL";
        } else {
            echo "$url is not a valid URL";
        }
    }
}
