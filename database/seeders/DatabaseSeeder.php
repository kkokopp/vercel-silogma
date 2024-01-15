<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => 'admin123'
        // ]);
        $this->call(JenisSenjataSeeder::class);
        $this->call(StatusSenjataSeeder::class);
        $this->call(SenjataSeeder::class);
    }
}
