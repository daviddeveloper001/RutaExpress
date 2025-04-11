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
    public function run() {
        $cities = [
            'Valle del Cauca' => ['Cali', 'Palmira', 'Buga'],
            'Cauca' => ['Popayán', 'Santander de Quilichao'],
            'Nariño' => ['Pasto', 'Ipiales', 'Tumaco']
        ];
    
        foreach ($cities as $departmentName => $cityNames) {
            $department = Department::where('name', $departmentName)->first();
    
            if (!$department) {
                $this->command->error("Departamento '$departmentName' no encontrado.");
                continue;
            }
    
            foreach ($cityNames as $cityName) {
                City::firstOrCreate(
                    [
                        'name' => $cityName,
                        'department_id' => $department->id // Usar UUID correcto
                    ],
                    ['id' => \Illuminate\Support\Str::uuid()]
                );
            }
        }
    }
}
