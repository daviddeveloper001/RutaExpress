<?php

namespace App\Enum;

enum BusinessTypeEnum: string
{
    case FOOD = 'food';
    case BEVERAGES = 'beverages';
    case RETAIL = 'retail';
    case SERVICES = 'services';

    public static function labels(): array
    {
        return [
            self::FOOD => 'Alimentos',
            self::BEVERAGES => 'Bebidas',
            self::RETAIL => 'Minorista',
            self::SERVICES => 'Servicios',
        ];
    }
}
