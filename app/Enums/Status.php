<?php

namespace App\Enums;

enum Status:string
{
    case PERENCANAAN = 'Perencanaan';
    case PEMBANGUNAN = 'Pembangunan';
    case SELESAI = 'Selesai';
}
