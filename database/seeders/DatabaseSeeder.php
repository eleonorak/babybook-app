<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use App\Models\User;
use Carbon\PHPStan\MacroExtension;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UnitSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MeasurementTypeSeeder::class);
        $this->call(MedicalTreatmentTypeSeeder::class);
        $this->call(FeedingTypeSeeder::class);
        $this->call(ChildrenSeeder::class);





    }
}
