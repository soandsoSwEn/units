<?php

namespace Soandso\Units\Converter;

use Soandso\Units\Enum\Precipitation as PrecipitationUnit;
use Soandso\Units\Value\Precipitation as PrecipitationValue;

/**
 * Converts precipitation amounts between supported units.
 */
final class Precipitation
{
    /**
     * Convert precipitation to target unit.
     */
    public static function convert(PrecipitationValue $precipitation, PrecipitationUnit $targetUnit): PrecipitationValue
    {
        if ($precipitation->unit() === $targetUnit) {
            return $precipitation;
        }

        $millimeters = self::toMillimeters(
            $precipitation->value(),
            $precipitation->unit(),
        );

        return PrecipitationValue::of(
            self::fromMillimeters(
                $millimeters,
                $targetUnit,
            ),
            $targetUnit,
        );
    }

    /**
     * Convert source value to millimeters.
     */
    private static function toMillimeters(float $value, PrecipitationUnit $unit): float
    {
        return match ($unit) {
            PrecipitationUnit::MM => $value,
            PrecipitationUnit::CM => $value * 10,
            PrecipitationUnit::M => $value * 1000,
            PrecipitationUnit::IN => $value * 25.4,
            PrecipitationUnit::FT => $value * 304.8,
        };
    }

    /**
     * Convert millimeters to target unit.
     */
    private static function fromMillimeters(float $value, PrecipitationUnit $unit): float
    {
        return match ($unit) {
            PrecipitationUnit::MM => $value,
            PrecipitationUnit::CM => $value / 10,
            PrecipitationUnit::M => $value / 1000,
            PrecipitationUnit::IN => $value / 25.4,
            PrecipitationUnit::FT => $value / 304.8,
        };
    }
}
