<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Enum\BusinessTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener una ciudad existente para asignarla a la compañía
        $city = City::where('name', 'Cali')->first();

        if (!$city) {
            $this->command->error("Ciudad 'Cali' no encontrada. Asegúrate de ejecutar el seeder de ciudades primero.");
            return;
        }

        // Crear la compañía
        Company::firstOrCreate(
            ['nit' => '123456789-0'],
            [
                'id' => Str::uuid(),
                'city_id' => $city->id,
                'business_type' => BusinessTypeEnum::FOOD, // Asegúrate de que este valor exista en tu enum
            ]
        );
    }
}
