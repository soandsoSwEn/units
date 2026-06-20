<?php

namespace Soandso\Units\Enum;

enum Pressure: string
{
    /**
     * hecto Pascals
     */
    case HPA = 'hPa';

    /**
     * Inches of mercury
     */
    case INHG = 'inHg';

    /**
     * millimeters of mercury
     */
    case MMHG = 'mmHg';

    /**
     * Pascals
     */
    case PA = 'Pa';

    /**
     * kilo Pascals
     */
    case KPA = 'kPa';

    /**
     * pounds per square inch
     */
    case PSI = 'psi';

    /**
     * millibars
     */
    case MB = 'mb';
}
