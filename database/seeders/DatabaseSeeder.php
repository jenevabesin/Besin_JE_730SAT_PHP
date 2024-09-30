<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

        User::factory()->create([
            'first_name' => 'Jeneva',
            'last_name' => 'Besin',

            'email' => 'jenevabesin16@gmail.com',
        ]);

        $this->call(JobSeeder::class);
    }
}
