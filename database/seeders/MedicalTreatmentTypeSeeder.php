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

            ],
            [
                'name' => 'Лекови',
                'color' => '#aed581',

            ],
        ];

        foreach ($medicalTreatmentTypes as $medicalTreatmentType)
        {
         MedicalTreatmentType::query()->create([
               'name'  => $medicalTreatmentType['name'],
               'color'  => $medicalTreatmentType['color'],
            ]);
        }
    }
}
