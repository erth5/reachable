<?php

namespace App\Console;

use App\Models\Address;
use App\Jobs\ProofAddressesJob;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $addresses = Address::all();
        $proofAddresses = $schedule->job($proofAddress = new ProofAddressesJob)
            ->everyMinute()
            ->onFailure(function () {
                info('failed'); // geht nicht
            })
            ->onSuccess(function () {
                logger('success');
            })
            ->after(function () {
                logger('finished');
            });
        ProofAddressesJob::dispatch();
        foreach ($addresses as $address) {
            info($address->name . ' scan from Kernel');
            $proofAddress->handle($address);
        }
        info('console.kernel ends'); //sollte gehen
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
