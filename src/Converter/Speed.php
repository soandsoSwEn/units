<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\Speed as SpeedUnit;
use Soandso\Units\Value\Speed as SpeedValue;

class Speed
{
    /**
     * Convert speed to target unit.
     */
    public static function convert(SpeedValue $speed, SpeedUnit $targetUnit): SpeedValue
    {
        if ($speed->unit() === $targetUnit) {
            return $speed;
        }

        $metersPerSecond = self::toMetersPerSecond(
            $speed->value(),
            $speed->unit(),
        );

        return SpeedValue::of(
            self::fromMetersPerSecond(
                $metersPerSecond,
                $targetUnit,
            ),
            $targetUnit,
        );
    }

    /**
     * Convert source value to m/s.
     */
    private static function toMetersPerSecond(float $value, SpeedUnit $unit): float
    {
        return match ($unit) {
            SpeedUnit::MS => $value,
            SpeedUnit::KMH => $value / 3.6,
            SpeedUnit::MPH => $value * 0.44704,
            SpeedUnit::KNOTS => $value * 0.514444,
            SpeedUnit::FT_S => $value * 0.3048,
            SpeedUnit::CM_S => $value / 100,
            SpeedUnit::M_MIN => $value / 60,
        };
    }

    /**
     * Convert m/s to target unit.
     */
    private static function fromMetersPerSecond(float $value, SpeedUnit $unit): float
    {
        return match ($unit) {
            SpeedUnit::MS => $value,
            SpeedUnit::KMH => $value * 3.6,
            SpeedUnit::MPH => $value / 0.44704,
            SpeedUnit::KNOTS => $value / 0.514444,
            SpeedUnit::FT_S => $value / 0.3048,
            SpeedUnit::CM_S => $value * 100,
            SpeedUnit::M_MIN => $value * 60,
        };
    }
}
