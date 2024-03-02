<?php

namespace Database\Seeders;

use App\Models\GrowthFact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class GrowthFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GrowthFact::query()->delete();
        for($i = 1; $i <= 12; $i++) {
            $content = file_get_contents(database_path("seeders/static/growth/{$i}.txt"));
            GrowthFact::query()->create([
                'number' => $i,
                'content' => $content,
            ]);
        }
    }
}
