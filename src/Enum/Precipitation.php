<?php

namespace Soandso\Units\Enum;

/**
 * Precipitation amount units.
 */
enum Precipitation: string
{
    /**
     * Millimeter.
     */
    case MM = 'mm';

    /**
     * Centimeter.
     */
    case CM = 'cm';

    /**
     * Meter.
     */
    case M = 'm';

    /**
     * Inch.
     */
    case IN = 'in';

    /**
     * Foot.
     */
    case FT = 'ft';
}
