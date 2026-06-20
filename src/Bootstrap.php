<?php

namespace Soandso\Units;

use Soandso\Units\Registry\Quantity;
use Soandso\Units\Registry\QuantityMetadata;
use Soandso\Units\Support\UnitHelper;
use Soandso\Units\Value\Temperature;
use Soandso\Units\Enum\Temperature as TemperatureUnit;

final class Bootstrap
{
    public static function registerDefaults(): void
    {
        Quantity::register(
            new QuantityMetadata(
                name: 'temperature',
                class: Temperature::class,
                description: 'Temperature',
                units: UnitHelper::values(
                    TemperatureUnit::class
                ),
            ),
        );
    }
}
