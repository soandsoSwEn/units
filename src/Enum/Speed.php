<?php

namespace Soandso\Units\Enum;

enum Speed: string
{
    /**
     * Meters per second.
     */
    case MS = 'm/s';

    /**
     * Kilometers per hour.
     */
    case KMH = 'km/h';

    /**
     * Miles per hour.
     */
    case MPH = 'mph';

    /**
     * Knots.
     */
    case KNOTS = 'kt';

    /**
     * Feet per second.
     */
    case FT_S = 'ft/s';

    /**
     * Centimeters per second.
     */
    case CM_S = 'cm/s';

    /**
     * Meters per minute.
     */
    case M_MIN = 'm/min';
}
