<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Order;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Support\Str;
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
            $this->command->error("Ciudad 'Cali' no encontrada. Ejecuta primero el CitySeeder.");
            return;
        }

        // Buscar o crear compañía
        $company = Company::where('nit', '123456789-0')->firstOrFail();

        // Crear clientes reales
        $this->call(CustomerSeeder::class);
        $customers = Customer::where('company_id', $company->id)->get();

        // Validar que hay clientes creados
        if ($customers->isEmpty()) {
            $this->command->error("No hay clientes. Ejecuta primero el CustomerSeeder.");
            return;
        }

        // Crear 50 pedidos asignados a clientes existentes (elimina el segundo loop)
        foreach ($customers as $customer) {
            for ($i = 0; $i < 17; $i++) { // 3 clientes * 17 = ~50 pedidos
                Order::create([
                    'id' => Str::uuid(),
                    'company_id' => $company->id,
                    'customer_id' => $customer->id, // Usar ID real del cliente
                    'products' => json_encode([['name' => 'Producto ' . Str::random(5), 'quantity' => rand(1,5)]]),
                    'status' => 'pending'
                ]);
            }
        }

        $this->command->info("Seeder de Cali ejecutado: 50 pedidos creados para {$company->nit}");
    }
}
