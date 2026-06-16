<?php

namespace Soandso\Units\Value;

use Soandso\Units\Contracts\Quantity;
use Soandso\Units\Enum\Temperature as TemperatureUnit;
use Soandso\Units\Converter\Temperature as TemperatureConverter;

class Temperature implements Quantity
{
    public function __construct(private float $value, private TemperatureUnit $unit)
    {
    }

    public function __toString(): string
    {
        return match ($this->unit) {
            TemperatureUnit::C => "{$this->value} °C",
            TemperatureUnit::F => "{$this->value} °F",
            TemperatureUnit::K => "{$this->value} K",
        };
    }

    public static function of(float $value, TemperatureUnit $unit): self
    {
        return new self($value, $unit);
    }

    public static function c(float $value): self
    {
        return new self($value, TemperatureUnit::C);
    }

    public static function f(float $value): self
    {
        return new self($value, TemperatureUnit::F);
    }

    public static function k(float $value): self
    {
        return new self($value, TemperatureUnit::K);
    }

    public function value(): float
    {
        return $this->value;
    }

    public function unit(): TemperatureUnit
    {
        return $this->unit;
    }

    public function to(TemperatureUnit $target): self
    {
        return TemperatureConverter::convert($this, $target);
    }

    public function toC(): self
    {
        return $this->to(TemperatureUnit::C);
    }

    public function toF(): self
    {
        return $this->to(TemperatureUnit::F);
    }

    public function toK(): self
    {
        return $this->to(TemperatureUnit::K);
    }

    public function equals(self $temperature): bool
    {
        return abs($this->toC()->value() - $temperature->toC()->value()) < 0.00001;
    }

    public function convertTo(TemperatureUnit $unit): self
    {
        return $this->to($unit);
    }
}
