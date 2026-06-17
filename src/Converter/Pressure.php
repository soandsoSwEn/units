<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\Pressure as PressureUnit;
use Soandso\Units\Value\Pressure as PressureValue;

final class Pressure
{
    public static function convert(PressureValue $pressure, PressureUnit $targetUnit): PressureValue
    {
        if ($pressure->unit() === $targetUnit) {
            return $pressure;
        }

        $hpa = self::toHpa($pressure->value(), $pressure->unit());

        return PressureValue::of(self::fromHpa($hpa, $targetUnit), $targetUnit);
    }

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