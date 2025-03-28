<?php

namespace App\Enum;

enum RiskTypeEnum: string
{
    case THEFT = 'theft';
    case TRAFFIC = 'traffic';
    case ROADWORKS = 'roadworks';
}
