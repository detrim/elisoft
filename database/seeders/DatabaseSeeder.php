<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = [
        [
        'name' => 'Super',
        'level' => 'admin',
        'password' => Hash::make('pass123'),
        'email' => 'superadmin@mail.co.id',
        'remember_token' => Str::random(40),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString(),
        ],
        [
        'name' => 'User',
        'level' => 'user',
        'password' => Hash::make('pass123'),
        'email' => 'user@mail.co.id',
        'remember_token' => Str::random(40),
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString(),
        ]
        ];
        User::insert($data);
    }
}
