<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    public function run()
    {
        Address::create([
            'name' => 'google.com'
        ]);
        Address::create([
            'name' => 'facebook.com'
        ]);
    }
}
