<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [

            [
                'name' => 'kg',
                'type' => 'weight',
            ],
            [
                'name' => 'lb',
                'type' => 'weight',
            ],
            [
                'name' => 'cm',
                'type' => 'length',
            ],
            [
                'name' => 'in',
                'type' => 'length',
            ],
            [
                'name' => 'ml',
                'type' => 'volume',
            ],
            [
                'name' => 'oz',
                'type' => 'volume',
            ],
            [
                'name' => 'C',
                'type' => 'temperature',
            ],
            [
                'name' => 'F',
                'type' => 'temperature',
            ],

        ];

        foreach ($units as $unit) {

            Unit::query()->create([
                'name' => $unit['name'],
                'type' => $unit['type']
            ]);
        }
    }
}
