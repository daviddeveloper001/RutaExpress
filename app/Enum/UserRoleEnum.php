<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';

    public static function forFilament(): array
    {
        return [
            self::ADMIN => 'Administrador',
            self::MANAGER => 'Gerente',
        ];
    }
}
