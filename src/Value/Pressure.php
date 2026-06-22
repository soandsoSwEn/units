<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Pressure as PressureUnit;
use Soandso\Units\Converter\Pressure as PressureConverter;

/**
 * Represents an immutable atmospheric or mechanical pressure value with an associated unit.
 */
final class Pressure implements Quantity
{
    public function __construct(private float $value, private PressureUnit $unit)
    {
    }

    /**
     * Creates a pressure instance with the specified value and unit.
     */
    public static function of(float $value, PressureUnit $unit): self
    {
        return new self($value, $unit);
    }

    /**
     * Creates a pressure value in hectopascals (hPa).
     */
    public static function hpa(float $value): self
    {
        return new self($value, PressureUnit::HPA);
    }

    /**
     * Creates a pressure value in millibars (mb).
     */
    public static function mb(float $value): self
    {
        return new self($value, PressureUnit::MB);
    }

    /**
     * Creates a pressure value in pascals (Pa).
     */
    public static function pa(float $value): self
    {
        return new self($value, PressureUnit::PA);
    }

    /**
     * Creates a pressure value in kilopascals (kPa).
     */
    public static function kpa(float $value): self
    {
        return new self($value, PressureUnit::KPA);
    }

    /**
     * Creates a pressure value in millimeters of mercury (mmHg).
     */
    public static function mmHg(float $value): self
    {
        return new self($value, PressureUnit::MMHG);
    }

    /**
     * Creates a pressure value in inches of mercury (inHg)..
     */
    public static function inHg(float $value): self
    {
        return new self($value, PressureUnit::INHG);
    }

    /**
     * Creates a pressure value in pounds per square inch (psi).
     */
    public static function psi(float $value): self
    {
        return new self($value, PressureUnit::PSI);
    }

    /**
     * Returns the numeric pressure value.
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Returns the pressure unit.
     */
    public function unit(): PressureUnit
    {
        return $this->unit;
    }

    /**
     * Converts the pressure to the specified unit.
     */
    public function to(PressureUnit $unit): self
    {
        return PressureConverter::convert($this, $unit);
    }

    /**
     * Converts the pressure to hectopascals (hPa).
     */
    public function toHpa(): self
    {
        return $this->to(PressureUnit::HPA);
    }

    /**
     * Converts the pressure to millibars (mb).
     */
    public function toMb(): self
    {
        return $this->to(PressureUnit::MB);
    }

    /**
     * Converts the pressure to pascals (Pa).
     */
    public function toPa(): self
    {
        return $this->to(PressureUnit::PA);
    }

    /**
     * Converts the pressure to kilopascals (kPa).
     */
    public function toKpa(): self
    {
        return $this->to(PressureUnit::KPA);
    }

    /**
     * Converts the pressure to millimeters of mercury (mmHg).
     */
    public function toMmHg(): self
    {
        return $this->to(PressureUnit::MMHG);
    }

    /**
     * Converts the pressure to inches of mercury (inHg).
     */
    public function toInHg(): self
    {
        return $this->to(PressureUnit::INHG);
    }

    /**
     * Converts the pressure to pounds per square inch (psi).
     */
    public function toPsi(): self
    {
        return $this->to(PressureUnit::PSI);
    }

    /**
     * Determines whether two pressure values are equal.
     */
    public function equals(self $pressure): bool
    {
        return abs($this->toHpa()->value() - $pressure->toHpa()->value()) < 0.00001;
    }

    /**
     * Returns a human-readable representation of the pressure.
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->value, $this->unit->value);
    }

    /**
     * Converts the pressure to the specified unit.
     */
    public function convertTo(PressureUnit $unit): self
    {
        return $this->to($unit);
    }
}
