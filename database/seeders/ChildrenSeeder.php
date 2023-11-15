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


        $timeBack=now()->subMinutes(5)->toDateTimeString();
        $timeNow = now()->toDateTimeString();
        $childOne->breast_feeds()->create([

            'date' => $timeNow,
        ]);

        $childOne->bottle_feeds()->create([
           'date' => $timeNow,
            'quantity' => 200.0,
            'unit_id'=>5,
        ]);
        $childOne->bottle_feeds()->create([
            'date' => $timeNow,
            'quantity' => 120.0,
            'unit_id'=>5,
        ]);

        $childOne->solid_feeds()->create([
            'date' => $timeNow,
        ]);

        $childOne->diaper_changes()->create([
            'date' => $timeBack,
        ]);

        $childOne->baths()->create([
            'date' => $timeBack,
        ]);
    }
}
