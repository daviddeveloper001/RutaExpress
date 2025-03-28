<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Cali = City::updateOrCreate([
            'name' => 'Cali',
            'department_id' => Department::where('name', 'Valle del Cauca')->first()->id
        ]);
        
        $Popayan = City::updateOrCreate([
            'name' => 'Popayán',
            'department_id' => Department::where('name', 'Cauca')->first()->id
        ]);

        $Pasto = City::updateOrCreate([
            'name' => 'Pasto',
            'department_id' => Department::where('name', 'Nariño')->first()->id
        ]);
    }
}
