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
            ],
            [
                'name' => 'Лекови',
            ],
        ];

        foreach ($medicalTreatmentTypes as $medicalTreatmentType)
        {
         MedicalTreatmentType::query()->create([
               'name'  => $medicalTreatmentType['name'],
            ]);
        }
    }
}
