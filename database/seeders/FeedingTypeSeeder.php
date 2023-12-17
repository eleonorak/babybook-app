<?php

namespace Database\Seeders;
use App\Models\FeedingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MedicalTreatmentType;
use Illuminate\Database\Seeder;

class FeedingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feedingTypes = [

            [
                'name' => 'Доење',
                'measurable'=> 0,
                'color' => '#81d4fa'
            ],
            [
                'name' => 'Шишенце',
                'measurable'=> 1,
                'color' => '#aed581'

            ],
            [
                'name' => 'Цврста храна',
                'measurable'=> 0,
                'color' => '#ffb74d',

            ],
        ];

        foreach ($feedingTypes as $feedingType)
        {
            FeedingType::query()->create([
               'name'  => $feedingType['name'],
                'measurable' => $feedingType['measurable'],
                'color' => $feedingType['color']
            ]);
        }
    }
}
