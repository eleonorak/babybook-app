<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MedicalTreatmentType;
use Illuminate\Database\Seeder;

class MedicalTreatmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicalTreatmentTypes = [
            [
                'name' => 'Вакцинација',
                'color' => '#8b5cf6',
                'is_vac' => 1,
            ],
            [
                'name' => 'Лекови',
                'color' => '#aed581',
            ],
            [
                'name' => 'Прегледи',
                'color' => '#d3b693',
            ],
        ];

        foreach ($medicalTreatmentTypes as $medicalTreatmentType)
        {
            MedicalTreatmentType::query()->create([
               'name'  => $medicalTreatmentType['name'],
               'color'  => $medicalTreatmentType['color'],
                'is_vac' => isset($medicalTreatmentType['is_vac']) ? (int) $medicalTreatmentType['is_vac'] : 0,
            ]);
        }
    }
}
