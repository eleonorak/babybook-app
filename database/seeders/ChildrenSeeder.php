<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\Vaccine;
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


        /**
         * @var Child[] $children
         */
        $children = [$childOne, $childSec];


        /*********** SLEEP PERIODS, BATHS, FEEDINGS & DIAPER CHANGES ************/

        for($i = 30; $i >= 1; $i--) {

            // Sleep periods & Diaper Changes
            foreach($children as $child) {
                /* @var Child $child */
                foreach([ [ [21,22], [7,10] ], [ [13,14], [14,16] ] ] as $period) {
                    $startH = mt_rand($period[0][0], $period[0][1]);
                    $endH = mt_rand($period[1][0], $period[1][1]);
                    $timeS = Carbon::now()->subDays($i)->hour($startH)->minute(mt_rand(0,60));
                    $timeE = Carbon::now()->subDays($i-1)->hour($endH)->minute(mt_rand(0,60));
                    $child->sleep_periods()->create([
                        'start' => $timeS->toDateTimeString(),
                        'end' => $timeE->toDateTimeString(),
                    ]);

                    // Solid food in the mornings
                    if($endH >= 7 && $endH <= 10) {
                        $child->feedings()->create([
                            'date' => $timeE->toImmutable()->addMinutes(mt_rand(1, 10))->toDateTimeString(),
                            'feeding_type_id' => 3 ,
                        ]);
                    }

                    // Bottle feed before sleep
                    $child->feedings()->create([
                        'date' => $timeS->toImmutable()->subMinutes(mt_rand(1, 5))->toDateTimeString(),
                        'feeding_type_id' => 2 ,
                        'quantity' => 200.0,
                        'unit_id' => 5,
                    ]);

                    // Diaper change before sleep
                    $child->diaper_changes()->create([
                        'date' => $timeS->toImmutable()->subMinutes(mt_rand(5, 15))->toDateTimeString(),
                    ]);

                    // Diaper change after sleep
                    $child->diaper_changes()->create([
                        'date' => $timeE->toImmutable()->addMinutes(mt_rand(10,15))->toDateTimeString(),
                    ]);
                }

                // Meal at 17
                $child->feedings()->create([
                    'date' => Carbon::now()->subDays($i)->hour(17)->minute(mt_rand(0, 60))->toDateTimeString(),
                    'feeding_type_id' => 3,
                ]);

            }

            // Baths & Diaper Changes
            foreach($children as $j => $child) {
                /* @var Child $child */
                if($i % 2 == 0 && $j % 2 == 1) {
                    $startH = mt_rand(18, 20);
                    $bathS = Carbon::now()->subDays($i)->hour($startH)->minute(mt_rand(0,60));
                    $child->baths()->create([
                        'date' => $bathS->toDateTimeString()
                    ]);
                    $child->diaper_changes()->create([
                        'date' => $bathS->toImmutable()->addMinutes(mt_rand(10,20))->toDateTimeString(),
                    ]);
                }

            }
        }

        /*********** MEDICAL TREATMENTS ************/
        foreach($children as $child) {

            /* @var \Carbon\Carbon $birth_date */
            $birth_date = $child->birth_date;
            $age_in_hrs = Carbon::now()->startOfDay()->diffInHours($birth_date);

            foreach(Vaccine::all() as $vaccine) {

                if( (int) $vaccine->age <= (int) $age_in_hrs) {
                    $treatment = $child->medical_treatments()->create([
                        'medical_treatment_type_id' => 1, // Vaccine
                        'date' => $birth_date->toImmutable()->addHours( $vaccine->age)->addDays(mt_rand(0, 5))->toDateTimeString()
                    ]);
                    if ($treatment) {
                        $treatment->vaccines()->sync($vaccine->id);
                    }
                }

            }

            // Other treatments
            for ($i = 0; $i < mt_rand(3, 9); $i++) {
                $t_time = $birth_date->toImmutable()->addMonth();
                if ($t_time < Carbon::now()) {
                    $childOne->medical_treatments()->create([
                        'medical_treatment_type_id' => mt_rand(2, 3),
                        'date' => $birth_date->toImmutable()->addMonth()->week(mt_rand(1, 2))->day(mt_rand(2, 3))->hour(mt_rand(9, 10))->toDateTimeString(),
                    ]);
                }
            }
        }

        /*********** MEASUREMENTS ************/

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

    }
}
