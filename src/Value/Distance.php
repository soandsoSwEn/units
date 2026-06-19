<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Distance as DistanceUnit;
use Soandso\Units\Converter\Distance as DistanceConverter;

final readonly class Distance  implements Quantity
{
    /**
     * Create a new distance value.
     */
    public function __construct(private float $value, private DistanceUnit $unit)
    {
    }

    /**
     * Create distance from arbitrary unit.
     */
    public static function of(float $value, DistanceUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Create distance in millimeters.
     */
    public static function mm(float $value): self
    {
        return new self($value, DistanceUnit::MM);
    }

    /**
     * Create distance in centimeters.
     */
    public static function cm(float $value): self
    {
        return new self($value, DistanceUnit::CM);
    }

    /**
     * Create distance in meters.
     */
    public static function m(float $value): self
    {
        return new self($value, DistanceUnit::M);
    }

    /**
     * Create distance in decameters.
     */
    public static function dam(float $value): self
    {
        return new self($value, DistanceUnit::DAM);
    }

    /**
     * Create distance in hectometers.
     */
    public static function hm(float $value): self
    {
        return new self($value, DistanceUnit::HM);
    }

    /**
     * Create distance in kilometers.
     */
    public static function km(float $value): self
    {
        return new self($value, DistanceUnit::KM);
    }

    /**
     * Create distance in inches.
     */
    public static function in(float $value): self
    {
        return new self($value, DistanceUnit::IN);
    }

    /**
     * Create distance in feet.
     */
    public static function ft(float $value): self
    {
        return new self($value, DistanceUnit::FT);
    }

    /**
     * Create distance in yards.
     */
    public static function yd(float $value): self
    {
        return new self($value, DistanceUnit::YD);
    }

    /**
     * Create distance in statute miles.
     */
    public static function mi(float $value): self
    {
        return new self($value, DistanceUnit::MI);
    }

    /**
     * Create distance in nautical miles.
     */
    public static function nm(float $value): self
    {
        return new self($value, DistanceUnit::NM);
    }

    /**
     * Get numeric value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Get distance unit.
     */
    public function unit(): DistanceUnit
    {
        return $this->unit;
    }

    /**
     * Convert to target unit.
     */
    public function to(DistanceUnit $unit): self
    {
        return DistanceConverter::convert($this, $unit);
    }

    public function toMm(): self
    {
        return $this->to(DistanceUnit::MM);
    }

    public function toCm(): self
    {
        return $this->to(DistanceUnit::CM);
    }

    public function toM(): self
    {
        return $this->to(DistanceUnit::M);
    }

    /**
     * Convert to decameters.
     */
    public function toDam(): self
    {
        return $this->to(DistanceUnit::DAM);
    }

    /**
     * Convert to hectometers.
     */
    public function toHm(): self
    {
        return $this->to(DistanceUnit::HM);
    }

    public function toKm(): self
    {
        return $this->to(DistanceUnit::KM);
    }

    public function toIn(): self
    {
        return $this->to(DistanceUnit::IN);
    }

    public function toFt(): self
    {
        return $this->to(DistanceUnit::FT);
    }

    public function toYd(): self
    {
        return $this->to(DistanceUnit::YD);
    }

    public function toMi(): self
    {
        return $this->to(DistanceUnit::MI);
    }

    public function toNm(): self
    {
        return $this->to(DistanceUnit::NM);
    }

    /**
     * Compare two distance values.
     */
    public function equals(self $distance): bool
    {
        return abs($this->toM()->value() - $distance->toM()->value()) < 0.00001;
    }

    /**
     * String representation.
     */
    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            $this->value,
            $this->unit->value,
        );
    }
}
