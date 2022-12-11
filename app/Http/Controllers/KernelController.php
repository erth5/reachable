<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Jobs\ProofAddressesJob;

class KernelController extends Controller
{
    public function run()
    {
        $addresses = Address::all();
        $proofAddressJob = new ProofAddressesJob;
        ProofAddressesJob::dispatch();
        foreach ($addresses as $address) {
            logger($address->name . ' scan from Controller');
            $proofAddressJob->handle($address);
        }
        return redirect()->route('main');
    }
}
