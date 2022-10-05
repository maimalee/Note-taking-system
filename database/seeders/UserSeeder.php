<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Anas',
            'password' => Hash::make('1234'),
            'email' => 'anas@note.test',
            'username' => 'anasment',
        ]);

        User::factory(mt_rand(5, 15))->create();
    }
}
