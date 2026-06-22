<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Value\Temperature as TemperatureValue;
use Soandso\Units\Enum\Temperature as TemperatureUnit;

/**
 * Temperature unit conversion service.
 */
final class Temperature
{
    /**
     * Converts a temperature value to the specified unit.
     *
     * If the source and target units are identical, the original instance is returned without
     * performing any calculations.
     */
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

    /**
     * Converts a temperature value to degrees Celsius.
     */
    private static function toCelsius(float $value, TemperatureUnit $unit): float
    {
        return match ($unit) {
            TemperatureUnit::C => $value,
            TemperatureUnit::F => ($value - 32) * 5 / 9,
            TemperatureUnit::K => $value - 273.15,
        };
    }

    /**
     * Converts a temperature value from degrees Celsius to the specified target unit.
     */
    private static function fromCelsius(float $value, TemperatureUnit $unit): float
    {
        return match ($unit) {
            TemperatureUnit::C => $value,
            TemperatureUnit::F => ($value * 9 / 5) + 32,
            TemperatureUnit::K => $value + 273.15,
        };
    }
}
