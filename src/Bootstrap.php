<?php

namespace Soandso\Units;

use Soandso\Units\Registry\Quantity;
use Soandso\Units\Registry\QuantityMetadata;
use Soandso\Units\Support\UnitHelper;
use Soandso\Units\Value\Distance;
use Soandso\Units\Value\Precipitation;
use Soandso\Units\Value\Pressure;
use Soandso\Units\Value\RelativeHumidity;
use Soandso\Units\Value\Speed;
use Soandso\Units\Value\Temperature;
use Soandso\Units\Enum\Temperature as TemperatureUnit;
use Soandso\Units\Enum\Speed as SpeedUnit;
use Soandso\Units\Enum\RelativeHumidity as RelativeHumidityUnit;
use Soandso\Units\Enum\Pressure as PressureUnit;
use Soandso\Units\Enum\Precipitation as PrecipitationUnit;
use Soandso\Units\Enum\Distance as DistanceUnit;

final class Bootstrap
{
    public static function init(): void
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

        Quantity::register(
            new QuantityMetadata(
                name: 'speed',
                class: Speed::class,
                description: 'Speed',
                units: UnitHelper::values(
                    SpeedUnit::class
                ),
            ),
        );

        Quantity::register(
            new QuantityMetadata(
                name: 'humidity',
                class: RelativeHumidity::class,
                description: 'Relative humidity',
                units: UnitHelper::values(
                    RelativeHumidityUnit::class
                ),
            ),
        );

        Quantity::register(
            new QuantityMetadata(
                name: 'pressure',
                class: Pressure::class,
                description: 'Pressure',
                units: UnitHelper::values(
                    PressureUnit::class
                ),
            ),
        );

        Quantity::register(
            new QuantityMetadata(
                name: 'precipitation',
                class: Precipitation::class,
                description: 'Precipitation',
                units: UnitHelper::values(
                    PrecipitationUnit::class
                ),
            ),
        );

        Quantity::register(
            new QuantityMetadata(
                name: 'distance',
                class: Distance::class,
                description: 'Distance',
                units: UnitHelper::values(
                    DistanceUnit::class
                ),
            ),
        );
    }
}
