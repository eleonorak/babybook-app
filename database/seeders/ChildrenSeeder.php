<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $childOne = Child::query()->create([
            'name' => 'Анастасија',
            'birth_date' => '2021-12-20',
            'gender' => 'женско',
            'photo' =>'',
            'user_id' => 1,
        ]);

        $timeNow = now()->toDateTimeString();
        $childOne->breast_feeds()->create([

            'date' => $timeNow,
        ]);
    }
}
