<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSenjataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\StatusSenjata::create([
            'nama_status_senjata' => 'Aktif',
        ]);
        \App\Models\StatusSenjata::create([
            'nama_status_senjata' => 'Perbaikan',
        ]);
        \App\Models\StatusSenjata::create([
            'nama_status_senjata' => 'Penyimpanan',
        ]);
    }
}
