<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Temperature as TemperatureUnit;
use Soandso\Units\Converter\Temperature as TemperatureConverter;

/**
 * Represents an immutable temperature value with an associated unit.
 */
final class Temperature implements Quantity
{
    public function __construct(private float $value, private TemperatureUnit $unit)
    {
    }

    /**
     * Returns a human-readable representation of the temperature.
     */
    public function __toString(): string
    {
        return match ($this->unit) {
            TemperatureUnit::C => "{$this->value} °C",
            TemperatureUnit::F => "{$this->value} °F",
            TemperatureUnit::K => "{$this->value} K",
        };
    }

    /**
     * Creates a temperature instance with the specified value and unit.
     */
    public static function of(float $value, TemperatureUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Creates a temperature in degrees Celsius.
     */
    public static function c(float $value): self
    {
        return new self($value, TemperatureUnit::C);
    }

    /**
     * Creates a temperature in degrees Fahrenheit.
     */
    public static function f(float $value): self
    {
        return new self($value, TemperatureUnit::F);
    }

    /**
     * Creates a temperature in Kelvin.
     */
    public static function k(float $value): self
    {
        return new self($value, TemperatureUnit::K);
    }

    /**
     * Returns the numeric temperature value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Returns the temperature unit.
     */
    public function unit(): TemperatureUnit
    {
        return $this->unit;
    }

    /**
     * Converts the temperature to the specified unit.
     */
    public function to(TemperatureUnit $target): self
    {
        return TemperatureConverter::convert($this, $target);
    }

    /**
     * Converts the temperature to degrees Celsius.
     */
    public function toC(): self
    {
        return $this->to(TemperatureUnit::C);
    }

    /**
     * Converts the temperature to degrees Fahrenheit.
     */
    public function toF(): self
    {
        return $this->to(TemperatureUnit::F);
    }

    /**
     * Converts the temperature to Kelvin.
     */
    public function toK(): self
    {
        return $this->to(TemperatureUnit::K);
    }

    /**
     * Determines whether two temperature values are equal.
     *
     * The comparison is performed after converting both temperatures
     * to Celsius and uses a small floating-point tolerance.
     */
    public function equals(self $temperature): bool
    {
        return abs($this->toC()->value() - $temperature->toC()->value()) < 0.00001;
    }

    /**
     * Converts the temperature to the specified unit.
     */
    public function convertTo(TemperatureUnit $unit): self
    {
        return $this->to($unit);
    }
}
