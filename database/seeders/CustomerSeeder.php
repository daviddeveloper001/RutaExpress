<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Buscar la compañía de Cali (debe existir previamente)
        $company = Company::where('nit', '123456789-0')->firstOrFail();
    
        $customers = [
            ['name' => 'Tienda La Bendición', 'frequent_location' => 'Calle 5 #23-45, Centro'],
            ['name' => 'MiniMarket Doña Rosa', 'frequent_location' => 'Avenida 6N #10-20'],
            ['name' => 'Restaurante Sabor Caucano', 'frequent_location' => 'Carrera 15 #5-30'],
        ];
    
        foreach ($customers as $customerData) {
            // Crear sin actualizar UUIDs existentes
            Customer::firstOrCreate(
                [
                    'name' => $customerData['name'],
                    'company_id' => $company->id
                ],
                [
                    'id' => Str::uuid(), // Solo se asigna si no existe
                    'frequent_location' => $customerData['frequent_location']
                ]
            );
        }
    
        $this->command->info(count($customers) . ' clientes creados para ' . $company->nit);
    }
}
