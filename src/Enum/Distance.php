<?php

namespace Soandso\Units\Enum;

enum Distance: string
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
     * Decameter.
     */
    case DAM = 'dam';

    /**
     * Hectometer.
     */
    case HM = 'hm';

    /**
     * Kilometer.
     */
    case KM = 'km';

    /**
     * Inch.
     */
    case IN = 'in';

    /**
     * Foot.
     */
    case FT = 'ft';

    /**
     * Yard.
     */
    case YD = 'yd';

    /**
     * Statute mile.
     */
    case MI = 'mi';

    /**
     * Nautical mile.
     */
    case NM = 'nm';
}
