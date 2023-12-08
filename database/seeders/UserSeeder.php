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
        User::query()->create([
            'name'=>"Eleonora",
            'email'=>"eleonora@krsteska.com",
            'password'=>bcrypt(123123),
            'weight_unit_id'=>1,
            'length_unit_id'=>3,
            'volume_unit_id'=>5,
            'temperature_unit_id'=>7,

        ]);

        User::query()->create([
            'name'=>"Darko",
            'email'=>"darko@darko.com",
            'password'=>bcrypt(123123),
            'weight_unit_id'=>1,
            'length_unit_id'=>3,
            'volume_unit_id'=>5,
            'temperature_unit_id'=>7,

        ]);
    }
}
