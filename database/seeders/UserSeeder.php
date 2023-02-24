<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Fabricyo Costa',
            'birthDate' => '1995-10-03',
            'email' => 'fabricyoc@gmail.com',
            'telephone' => '(84)99701-4812',
            'photo' => fake()->imageUrl(),
            'cpf' => '111.222.333-44',
            'type' => 'admin',
            'password' => bcrypt(123),
        ]);

        User::factory(9)->create();
    }
}
