<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\RelativeHumidity as HumidityUnit;
use Soandso\Units\Converter\RelativeHumidity as HumidityConverter;

final readonly class RelativeHumidity implements Quantity
{
    /**
     * Create a new humidity value.
     */
    public function __construct(private float $value, private HumidityUnit $unit)
    {
    }

    /**
     * Create humidity from arbitrary unit.
     */
    public static function of(float $value, HumidityUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Create humidity in percent.
     */
    public static function percent(float $value): self
    {
        return new self($value, HumidityUnit::PERCENT);
    }

    /**
     * Create humidity as fraction.
     */
    public static function fraction(float $value): self
    {
        return new self($value, HumidityUnit::FRACTION);
    }

    /**
     * Get numeric value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Get humidity unit.
     */
    public function unit(): HumidityUnit
    {
        return $this->unit;
    }

    /**
     * Convert to target unit.
     */
    public function to(HumidityUnit $unit): self
    {
        return HumidityConverter::convert($this, $unit);
    }

    /**
     * Convert to percent.
     */
    public function toPercent(): self
    {
        return $this->to(HumidityUnit::PERCENT);
    }

    /**
     * Convert to fraction.
     */
    public function toFraction(): self
    {
        return $this->to(HumidityUnit::FRACTION);
    }

    /**
     * Compare humidity values.
     */
    public function equals(self $humidity): bool
    {
        return abs($this->toFraction()->value() - $humidity->toFraction()->value()) < 0.00001;
    }

    /**
     * String representation.
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->value, $this->unit->value);
    }

    /**
     * Converts the relative humidity to the specified unit.
     */
    public function convertTo(HumidityUnit $unit): self
    {
        return $this->to($unit);
    }
}
