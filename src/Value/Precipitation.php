<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Precipitation as PrecipitationUnit;
use Soandso\Units\Converter\Precipitation as PrecipitationConverter;

/**
 * Immutable precipitation amount value object.
 */
final readonly class Precipitation implements Quantity
{
    /**
     * Create a new precipitation value.
     */
    public function __construct(private float $value, private PrecipitationUnit $unit)
    {
    }

    /**
     * Create precipitation from arbitrary unit.
     */
    public static function of(float $value, PrecipitationUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Create precipitation in millimeters.
     */
    public static function mm(float $value): self
    {
        return new self($value, PrecipitationUnit::MM);
    }

    /**
     * Create precipitation in centimeters.
     */
    public static function cm(float $value): self
    {
        return new self($value, PrecipitationUnit::CM);
    }

    /**
     * Create precipitation in meters.
     */
    public static function m(float $value): self
    {
        return new self($value, PrecipitationUnit::M);
    }

    /**
     * Create precipitation in inches.
     */
    public static function in(float $value): self
    {
        return new self($value, PrecipitationUnit::IN);
    }

    /**
     * Create precipitation in feet.
     */
    public static function ft(float $value): self
    {
        return new self($value, PrecipitationUnit::FT);
    }

    /**
     * Get numeric value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Get precipitation unit.
     */
    public function unit(): PrecipitationUnit
    {
        return $this->unit;
    }

    /**
     * Convert to target unit.
     */
    public function to(PrecipitationUnit $unit): self
    {
        return PrecipitationConverter::convert($this, $unit);
    }

    /**
     * Convert to millimeters.
     */
    public function toMm(): self
    {
        return $this->to(PrecipitationUnit::MM);
    }

    /**
     * Convert to centimeters.
     */
    public function toCm(): self
    {
        return $this->to(PrecipitationUnit::CM);
    }

    /**
     * Convert to meters.
     */
    public function toM(): self
    {
        return $this->to(PrecipitationUnit::M);
    }

    /**
     * Convert to inches.
     */
    public function toIn(): self
    {
        return $this->to(PrecipitationUnit::IN);
    }

    /**
     * Convert to feet.
     */
    public function toFt(): self
    {
        return $this->to(PrecipitationUnit::FT);
    }

    /**
     * Compare precipitation values.
     */
    public function equals(self $precipitation): bool
    {
        return abs($this->toMm()->value() - $precipitation->toMm()->value()) < 0.00001;
    }

    /**
     * String representation.
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->value, $this->unit->value);
    }
}
