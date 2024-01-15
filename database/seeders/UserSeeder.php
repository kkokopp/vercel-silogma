<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::factory()->create([
            'name' => 'admin',
            'kode_user' => 'U-001',
            'email' => 'admin@gmail.com',
            'nomor_tlp' => '087717932289',
            'nomor_induk' => '1234567890',
            'password' => 'admin123'
        ]);

        $admin->assignRole('admin');


        // $user = User::factory()->create([
        //     'name' => 'user',
        //     'kode_user' => 'U-002',
        //     'email' => 'user@gmail.com',
        //     'password' => 'user1234'
        // ]);

        // $user->assignRole('user');
    }
}
