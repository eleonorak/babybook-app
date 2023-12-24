<?php

namespace Database\Seeders;

use App\Models\Child;
use Carbon\Carbon;
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




        //$timeBack=now()->subMinutes(5)->toDateTimeString();
        //$timeNow = now()->toDateTimeString();

        $childOne->feedings()->create([
            'date' => Carbon::now()->subHours(1)->toDateTimeString(),
            'feeding_type_id' => 2 ,
            'quantity' => 200.0,
            'unit_id'=>5,
        ]);

        $childOne->feedings()->create([
            'date' => Carbon::now()->subHours(2)->toDateTimeString(),
            'feeding_type_id' => 2 ,
            'quantity' => 200.0,
            'unit_id'=>5,
        ]);

        $childOne->feedings()->create([
            'date' => Carbon::now()->subHours(3)->toDateTimeString(),
            'feeding_type_id' => 1 ,
        ]);
        $childOne->feedings()->create([
            'date' => Carbon::now()->subHours(4)->toDateTimeString(),
            'feeding_type_id' => 1 ,
        ]);

        $childOne->feedings()->create([
            'date' => Carbon::now()->subHours(5)->toDateTimeString(),
            'feeding_type_id' => 3 ,
        ]);

        $childOne->sleep_periods()->create([
            'start' => Carbon::now()->subHours(1)->toDateTimeString(),
            'end' => Carbon::now()->subHours(1)->toDateTimeString(),

            ]);

        $childOne->sleep_periods()->create([
        'start' => Carbon::now()->subHours(1)->toDateTimeString(),
            'end' => Carbon::now()->subHours(1)->toDateTimeString(),

        ]);


        $childOne->diaper_changes()->create([
            'date' => Carbon::now()->subHours(5)->toDateTimeString(),
        ]);

        $childOne->baths()->create([
            'date' => Carbon::now()->subHours(5)->toDateTimeString(),
        ]);

        $childOne->measurements()->create([
            'measurement_type_id'=>2,
            'value'   => 58,
            'date'    => Carbon::now()->subHours(5)->toDateTimeString(),
            'unit_id' => 3,
        ]);

        $childOne->measurements()->create([
            'measurement_type_id'=>3,
            'value'   => 6,
            'date'    => Carbon::now()->subHours(5)->toDateTimeString(),
            'unit_id' => 1,
        ]);

        $childOne->measurements()->create([
           'measurement_type_id'=>1,
            'value'   => 35.0,
            'date'    => Carbon::now()->subHours(5)->toDateTimeString(),
            'unit_id' => 3,
        ]);

        $childOne->medical_treatments()->create([
            'medical_treatment_type_id'=>2,
            'date'    => Carbon::now()->subHours(5)->toDateTimeString(),
        ]);

        $childOne->medical_treatments()->create([
            'medical_treatment_type_id'=>1,
            'date'    => Carbon::now()->subHours(5)->toDateTimeString(),
        ]);

    }
}
