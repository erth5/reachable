<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProofAddressesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $address;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $address = $address;
    }

    /**
     * Logging funktioniert nicht im Job
     *
     * @return void
     */
    public function handle($address)
    {
        ProofAddressesJob::dispatch();
        exec("ping -n 1 " . $address->name, $output, $result);
        switch ($result) {
            case 0:
                $address->state = 0;
                break;
            case 1:
                $address->state = 1;
                break;
            case 2:
                // logger('Syntax Fault: ' . $output .  $result);
                $address->state = 3;
                break;
        }
        $address->save();
    }
}
