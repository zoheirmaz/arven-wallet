<?php

use App\Entities\Enumeration;
use Illuminate\Database\Seeder;

class EnumerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enumeration::create([
            Enumeration::ID => 1,
            Enumeration::TITLE => 'payment gateways'
        ]);

        Enumeration::create([
            Enumeration::ID => 2,
            Enumeration::TITLE => 'zarinpal',
            Enumeration::PARENT_ID => 1,
        ]);

        Enumeration::create([
            Enumeration::ID => 3,
            Enumeration::TITLE => 'transaction status'
        ]);

        Enumeration::create([
            Enumeration::ID => 4,
            Enumeration::TITLE => 'waiting',
            Enumeration::PARENT_ID => 3,
        ]);

        Enumeration::create([
            Enumeration::ID => 5,
            Enumeration::TITLE => 'paid',
            Enumeration::PARENT_ID => 3,
        ]);

        Enumeration::create([
            Enumeration::ID => 6,
            Enumeration::TITLE => 'failed',
            Enumeration::PARENT_ID => 3,
        ]);
    }
}
