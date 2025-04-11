<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buscar una compañía existente
        $company = Company::where('nit', '123456789-0')->first();

        if (!$company) {
            $this->command->error("Compañía no encontrada. Ejecuta primero el CompanySeeder.");
            return;
        }

        // Usuario 1
        User::firstOrCreate(
            ['email' => 'deivy@example.com'],
            [
                'id' => Str::uuid(),
                'name' => 'Deivy',
                'password' => bcrypt('12345678'),
                'company_id' => $company->id,
                'role' => 'admin',
                'phone' => '1234567890'
            ]
        );

        // Usuario 2
        User::firstOrCreate(
            ['email' => 'daniel@example.com'],
            [
                'id' => Str::uuid(),
                'name' => 'Daniel',
                'password' => bcrypt('12345678'),
                'company_id' => $company->id,
                'role' => 'admin',
                'phone' => '0987654321'
            ]
        );
    }
}
