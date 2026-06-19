<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\Distance as DistanceUnit;
use Soandso\Units\Value\Distance as DistanceValue;

final class Distance
{
    /**
     * Convert distance to target unit.
     */
    public static function convert(DistanceValue $distance, DistanceUnit $targetUnit): DistanceValue
    {
        if ($distance->unit() === $targetUnit) {
            return $distance;
        }

        $meters = self::toMeters(
            $distance->value(),
            $distance->unit(),
        );

        return DistanceValue::of(
            self::fromMeters(
                $meters,
                $targetUnit,
            ),
            $targetUnit,
        );
    }

    /**
     * Convert source value to meters.
     */
    private static function toMeters(float $value, DistanceUnit $unit): float
    {
        return match ($unit) {
            DistanceUnit::MM => $value / 1000,
            DistanceUnit::CM => $value / 100,
            DistanceUnit::M => $value,
            DistanceUnit::DAM => $value * 10,
            DistanceUnit::HM => $value * 100,
            DistanceUnit::KM => $value * 1000,

            DistanceUnit::IN => $value * 0.0254,
            DistanceUnit::FT => $value * 0.3048,
            DistanceUnit::YD => $value * 0.9144,

            DistanceUnit::MI => $value * 1609.344,

            DistanceUnit::NM => $value * 1852,
        };
    }

    /**
     * Convert meters to target unit.
     */
    private static function fromMeters(float $value, DistanceUnit $unit): float
    {
        return match ($unit) {
            DistanceUnit::MM => $value * 1000,
            DistanceUnit::CM => $value * 100,
            DistanceUnit::M => $value,
            DistanceUnit::DAM => $value / 10,
            DistanceUnit::HM => $value / 100,
            DistanceUnit::KM => $value / 1000,

            DistanceUnit::IN => $value / 0.0254,
            DistanceUnit::FT => $value / 0.3048,
            DistanceUnit::YD => $value / 0.9144,

            DistanceUnit::MI => $value / 1609.344,

            DistanceUnit::NM => $value / 1852,
        };
    }
}
