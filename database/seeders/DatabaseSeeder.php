<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'adm@g.c',
            'password' => Hash::make('11223344'),
            'role' => 'admin'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'edt@g.c',
            'password' => Hash::make('11223344'),
            'role' => 'editor'
        ]);
    }
}
