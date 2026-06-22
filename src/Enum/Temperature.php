<?php

namespace Soandso\Units\Enum;

/**
 * Temperature measurement units.
 *
 * Supported units:
 *  - Celsius (°C)
 *  - Fahrenheit (°F)
 *  - Kelvin (K)
 *
 * This enum is used by the {@see \Soandso\Units\Value\Temperature} value object and temperature conversion
 * services throughout the library.
 */
enum Temperature: string
{
    /**
     * Degrees Celsius.
     */
    case C = 'C';

    /**
     * Degrees Fahrenheit.
     */
    case F = 'F';

    /**
     * Kelvin.
     */
    case K = 'K';
}
