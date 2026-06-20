<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Value\Temperature as TemperatureValue;
use Soandso\Units\Enum\Temperature as TemperatureUnit;

final class Temperature
{
    public static function convert(TemperatureValue $temperature, TemperatureUnit $targetUnit): TemperatureValue
    {
        if ($temperature->unit() === $targetUnit) {
            return $temperature;
        }

        $celsius = self::toCelsius(
            $temperature->value(),
            $temperature->unit(),
        );

        return TemperatureValue::of(
            self::fromCelsius($celsius, $targetUnit),
            $targetUnit,
        );
    }

    private static function toCelsius(float $value, TemperatureUnit $unit): float
    {
        return match ($unit) {
            TemperatureUnit::C => $value,
            TemperatureUnit::F => ($value - 32) * 5 / 9,
            TemperatureUnit::K => $value - 273.15,
        };
    }

    private static function fromCelsius(float $value, TemperatureUnit $unit): float
    {
        return match ($unit) {
            TemperatureUnit::C => $value,
            TemperatureUnit::F => ($value * 9 / 5) + 32,
            TemperatureUnit::K => $value + 273.15,
        };
    }
}
