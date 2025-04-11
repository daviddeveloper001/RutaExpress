<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Order;
use App\Models\Company;
use App\Enum\BusinessTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CaliSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar la ciudad "Cali"
        $city = City::where('name', 'Cali')->first();

        if (!$city) {
            $this->command->error("Ciudad 'Cali' no encontrada. Ejecuta primero el seeder de ciudades.");
            return;
        }

        // Buscar compañía ya existente
        $company = Company::where('nit', '123456789-0')->first();

        if (!$company) {
            $this->command->error("Compañía con NIT 123456789-0 no encontrada. Ejecuta primero el CompanySeeder.");
            return;
        }

        // Asegurar que la compañía esté correctamente asignada a Cali y tenga tipo FOOD
        $company->update([
            'city_id' => $city->id,
            'business_type' => BusinessTypeEnum::FOOD,
        ]);

        // Generar 50 pedidos para la compañía
        Order::factory()
            ->count(50)
            ->for($company)
            ->create();

        $this->command->info("Seeder de Cali ejecutado correctamente con 50 pedidos para la empresa {$company->nit}.");
    }
}
