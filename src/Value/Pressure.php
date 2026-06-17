<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Pressure as PressureUnit;
use Soandso\Units\Converter\Pressure as PressureConverter;

final class Pressure implements Quantity
{
    public function __construct(private float $value, private PressureUnit $unit)
    {
    }

    public static function of(float $value, PressureUnit $unit): self
    {
        return new self($value, $unit);
    }

    public static function hpa(float $value): self
    {
        return new self($value, PressureUnit::HPA);
    }

    public static function mb(float $value): self
    {
        return new self($value, PressureUnit::MB);
    }

    public static function pa(float $value): self
    {
        return new self($value, PressureUnit::PA);
    }

    public static function kpa(float $value): self
    {
        return new self($value, PressureUnit::KPA);
    }

    public static function mmHg(float $value): self
    {
        return new self($value, PressureUnit::MMHG);
    }

    public static function inHg(float $value): self
    {
        return new self($value, PressureUnit::INHG);
    }

    public static function psi(float $value): self
    {
        return new self($value, PressureUnit::PSI);
    }

    public function value(): float
    {
        return $this->value;
    }

    public function unit(): PressureUnit
    {
        return $this->unit;
    }

    public function to(PressureUnit $unit): self
    {
        return PressureConverter::convert($this, $unit);
    }

    public function toHpa(): self
    {
        return $this->to(PressureUnit::HPA);
    }

    public function toMb(): self
    {
        return $this->to(PressureUnit::MB);
    }

    public function toPa(): self
    {
        return $this->to(PressureUnit::PA);
    }

    public function toKpa(): self
    {
        return $this->to(PressureUnit::KPA);
    }

    public function toMmHg(): self
    {
        return $this->to(PressureUnit::MMHG);
    }

    public function toInHg(): self
    {
        return $this->to(PressureUnit::INHG);
    }

    public function toPsi(): self
    {
        return $this->to(PressureUnit::PSI);
    }

    public function equals(self $pressure): bool
    {
        return abs(
                $this->toHpa()->value()
                - $pressure->toHpa()->value()
            ) < 0.00001;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            $this->value,
            $this->unit->value,
        );
    }
}