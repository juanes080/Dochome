<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Medicina General',
            'Pediatría',
            'Psicología',
            'Cardiología',
            'Urología',
            'Dermatología'
        ];
        foreach ($specialties as $specialty){
            Specialty::create([
                'name' => $specialty
            ]);
        }
    }
}
