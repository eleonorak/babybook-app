<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        ]);
        $childSec = Child::query()->create([
            'name' => 'Bebe X',
            'birth_date' => '2023-6-20',
            'gender' => 'машко',
            'photo' =>'',
        ]);

        DB::table('child_user')->insert([
            'user_id'=>1,
            'child_id'=>$childOne->id
        ]);

        DB::table('child_user')->insert([
            'user_id'=>1,
            'child_id'=>$childSec->id
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

        $childOne->measurements()->create([
            'measurement_type_id'=>2,
            'value'   => 58,
            'date'    => $timeNow,
            'unit_id' => 3,
        ]);

        $childOne->measurements()->create([
            'measurement_type_id'=>3,
            'value'   => 6,
            'date'    => $timeNow,
            'unit_id' => 1,
        ]);

        $childOne->measurements()->create([
           'measurement_type_id'=>1,
            'value'   => 35.0,
            'date'    => $timeNow,
            'unit_id' => 3,
        ]);

        $childOne->medical_treatments()->create([
            'medical_treatment_type_id'=>2,
            'date'    => $timeNow,
        ]);

        $childOne->medical_treatments()->create([
            'medical_treatment_type_id'=>1,
            'date'    => $timeBack,
        ]);

    }
}
