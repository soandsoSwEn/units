<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\RelativeHumidity as HumidityUnit;
use Soandso\Units\Value\RelativeHumidity as HumidityValue;

final class RelativeHumidity
{
    /**
     * Convert humidity to target unit.
     */
    public static function convert(HumidityValue $humidity, HumidityUnit $targetUnit): HumidityValue
    {
        if ($humidity->unit() === $targetUnit) {
            return $humidity;
        }

        $fraction = self::toFraction($humidity->value(), $humidity->unit());

        return HumidityValue::of(self::fromFraction($fraction, $targetUnit), $targetUnit);
    }

    /**
     * Convert value to fraction.
     */
    private static function toFraction(float $value, HumidityUnit $unit): float
    {
        return match ($unit) {
            HumidityUnit::FRACTION => $value,
            HumidityUnit::PERCENT => $value / 100,
        };
    }

    /**
     * Convert fraction to target unit.
     */
    private static function fromFraction(float $value, HumidityUnit $unit): float
    {
        return match ($unit) {
            HumidityUnit::FRACTION => $value,
            HumidityUnit::PERCENT => $value * 100,
        };
    }
}
