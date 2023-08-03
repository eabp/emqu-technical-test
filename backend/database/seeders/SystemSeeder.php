<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\System;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        System::create([
            'name' => 'Google',
            'ip_address' => '8.8.8.8',
        ]);

        System::create([
            'name' => 'Localhost',
            'ip_address' => '127.0.0.1'
        ]);

        System::create([
            'name' => 'xbtech',
            'ip_address' => '112.1.43.45'
        ]);

        System::create([
            'name' => 'externo01',
            'ip_address' => '190.17.45.10'
        ]);
    }
}
