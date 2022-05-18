<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = ['demo1@example.com', 'demo2@example.com'];

        foreach ($emails as $email) {
            User::factory()->create(['email' => $email]);
        }
    }
}
