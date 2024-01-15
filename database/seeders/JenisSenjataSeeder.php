<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSenjataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Senjata Sniper',
            'slug' => 'senjata-sniper',
        ]);
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Pesawat Angkut',
            'slug' => 'pesawat-angkut',
        ]);
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Kapal Perang',
            'slug' => 'kapal-perang',
        ]);
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Pesawat Tempur',
            'slug' => 'pesawat-tempur',
        ]);
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Submachine Gun',
            'slug' => 'submachine-gun',
        ]);
        \App\Models\JenisSenjata::create([
            'nama_jenis_senjata' => 'Ranpur dan Rantis',
            'slug' => 'ranpur-dan-rantis',
        ]);
    }
}
