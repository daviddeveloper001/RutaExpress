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
    public function run()
    {
        $city = City::where('name', 'Cali')->firstOrFail();

        // Generar UUID fijo para la compañía (evita cambios)
        $companyUuid = Str::uuid();

        Company::firstOrCreate(
            ['nit' => '123456789-0'],
            [
                'id' => $companyUuid, // UUID fijo si se crea por primera vez
                'city_id' => $city->id,
                'business_type' => BusinessTypeEnum::FOOD
            ]
        );

        // Asignar el mismo UUID a UserSeeder si es necesario
        config(['ruta_express.company_uuid' => $companyUuid]);
    }
}