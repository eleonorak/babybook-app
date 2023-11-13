<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MedicalIntervationType;
use Illuminate\Database\Seeder;

class MedicalIntervationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicalIntervationTypes = [

            [
                'name' => 'Вакцинација',
            ],
            [
                'name' => 'Лекови',
            ],
        ];

        foreach ($medicalIntervationTypes as $medicalIntervationType)
        {
         MedicalIntervationType::query()->create([
               'name'  => $medicalIntervationType['name'],
            ]);
        }
    }
}
