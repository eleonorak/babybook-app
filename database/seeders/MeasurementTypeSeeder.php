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
                'color' => '#81d4fa',
                'type' => 'length'
            ],
            [
                'name' => 'Висина',
                'color' => '#aed581',
                'type' => 'length'
            ],
            [
                'name' => 'Тежина',
                'color' => '#ffb74d',
                'type' => 'weight'
            ],
            [
                'name' => 'Телесна температура',
                'color' => '#8b5cf6',
                'type' => 'temperature'
            ],
        ];

        foreach ($measurementTypes as $measurementType) {

            MeasurementType::query()->create([
                'name' => $measurementType['name'],
                'color' => $measurementType['color'],
                'type' => $measurementType['type'],
            ]);
        }

    }
}
