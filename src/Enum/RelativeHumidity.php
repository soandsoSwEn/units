<?php

namespace Soandso\Units\Enum;

enum RelativeHumidity: string
{
    /**
     * Percent relative humidity.
     */
    case PERCENT = '%';

    /**
     * Fraction (0..1).
     */
    case FRACTION = 'fraction';
}
