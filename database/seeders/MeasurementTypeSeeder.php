<?php

namespace Database\Seeders;

use App\Models\MeasurementType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $measurementTypes = [

            [
                'name' => 'Обем на глава',
            ],
            [
                'name' => 'Висина',
            ],
            [
                'name' => 'Тежина',
            ],
            [
                'name' => 'Телесна температура',
            ],
            ];

        foreach ($measurementTypes as $measurementType ) {

            MeasurementType::query()->create([
                'name' => $measurementType['name'],
            ]);
        }

    }
}
