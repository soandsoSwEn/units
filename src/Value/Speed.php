<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Speed as SpeedUnit;
use Soandso\Units\Converter\Speed as SpeedConverter;

final readonly class Speed implements Quantity
{
    /**
     * Create a new speed value.
     */
    public function __construct(private float $value, private SpeedUnit $unit)
    {
    }

    /**
     * Create speed from arbitrary unit.
     */
    public static function of(float $value, SpeedUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Create speed in m/s.
     */
    public static function ms(float $value): self
    {
        return new self($value, SpeedUnit::MS);
    }

    /**
     * Create speed in km/h.
     */
    public static function kmh(float $value): self
    {
        return new self($value, SpeedUnit::KMH);
    }

    /**
     * Create speed in mph.
     */
    public static function mph(float $value): self
    {
        return new self($value, SpeedUnit::MPH);
    }

    /**
     * Create speed in knots.
     */
    public static function knots(float $value): self
    {
        return new self($value, SpeedUnit::KNOTS);
    }

    /**
     * Create speed in feet per second.
     */
    public static function ftS(float $value): self
    {
        return new self($value, SpeedUnit::FT_S);
    }

    /**
     * Create speed in centimeters per second.
     */
    public static function cmS(float $value): self
    {
        return new self($value, SpeedUnit::CM_S);
    }

    /**
     * Create speed in meters per minute.
     */
    public static function mMin(float $value): self
    {
        return new self($value, SpeedUnit::M_MIN);
    }

    /**
     * Get numeric value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Get speed unit.
     */
    public function unit(): SpeedUnit
    {
        return $this->unit;
    }

    /**
     * Convert to target unit.
     */
    public function to(SpeedUnit $unit): self
    {
        return SpeedConverter::convert($this, $unit);
    }

    /**
     * Convert to m/s.
     */
    public function toMs(): self
    {
        return $this->to(SpeedUnit::MS);
    }

    /**
     * Convert to km/h.
     */
    public function toKmh(): self
    {
        return $this->to(SpeedUnit::KMH);
    }

    /**
     * Convert to mph.
     */
    public function toMph(): self
    {
        return $this->to(SpeedUnit::MPH);
    }

    /**
     * Convert to knots.
     */
    public function toKnots(): self
    {
        return $this->to(SpeedUnit::KNOTS);
    }

    /**
     * Convert to feet per second.
     */
    public function toFtS(): self
    {
        return $this->to(SpeedUnit::FT_S);
    }

    /**
     * Convert to centimeters per second.
     */
    public function toCmS(): self
    {
        return $this->to(SpeedUnit::CM_S);
    }

    /**
     * Convert to meters per minute.
     */
    public function toMMin(): self
    {
        return $this->to(SpeedUnit::M_MIN);
    }

    /**
     * Compare two speed values.
     */
    public function equals(self $speed): bool
    {
        return abs($this->toMs()->value() - $speed->toMs()->value()) < 0.00001;
    }

    /**
     * String representation.
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->value, $this->unit->value);
    }

    public function convertTo(SpeedUnit $unit): self
    {
        return $this->to($unit);
    }
}
