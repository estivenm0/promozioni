<?php

namespace App\Enums;

enum StatusEnum: string
{
    case APROBADO = 'aprobado';
    case RECHAZADO = 'rechazado';
    case PENDIENTE = 'pendiente';

    public function toString(): ?string
    {
        return match ($this) {
            self::APROBADO => 'Aprobado',
            self::RECHAZADO => 'Rechazado',
            self::PENDIENTE => 'Pendiente',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::APROBADO => 'success',
            self::RECHAZADO => 'red',
            self::PENDIENTE => 'gray',
        };
    }
}
