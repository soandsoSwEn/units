<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\Pressure as PressureUnit;
use Soandso\Units\Value\Pressure as PressureValue;

/**
 * Pressure unit conversion service.
 */
final class Pressure
{
    /**
     * Converts a pressure value to the specified unit.
     *
     * If the source and target units are identical, the original instance is returned without
     * performing any calculations.
     */
    public static function convert(PressureValue $pressure, PressureUnit $targetUnit): PressureValue
    {
        if ($pressure->unit() === $targetUnit) {
            return $pressure;
        }

        $hpa = self::toHpa($pressure->value(), $pressure->unit());

        return PressureValue::of(self::fromHpa($hpa, $targetUnit), $targetUnit);
    }

    /**
     * Converts a pressure value to hectopascals (hPa).
     */
    private static function toHpa(float $value, PressureUnit $unit): float
    {
        return match ($unit) {
            PressureUnit::HPA => $value,
            PressureUnit::MB => $value,
            PressureUnit::PA => $value / 100,
            PressureUnit::KPA => $value * 10,
            PressureUnit::MMHG => $value * 1.33322387415,
            PressureUnit::INHG => $value * 33.8638866667,
            PressureUnit::PSI => $value * 68.9475729,
        };
    }

    /**
     * Converts a pressure value from hectopascals (hPa) to the specified target unit.
     */
    private static function fromHpa(float $value, PressureUnit $unit): float
    {
        return match ($unit) {
            PressureUnit::HPA => $value,
            PressureUnit::MB => $value,
            PressureUnit::PA => $value * 100,
            PressureUnit::KPA => $value / 10,
            PressureUnit::MMHG => $value / 1.33322387415,
            PressureUnit::INHG => $value / 33.8638866667,
            PressureUnit::PSI => $value / 68.9475729,
        };
    }
}
