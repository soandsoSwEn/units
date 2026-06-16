<?php

namespace Soandso\Units\Enum;

enum Pressure: string
{
    case HPA = 'hPa';

    //ICAO / METAR
    case INHG = 'inHg';

    //СІС/СНД, historical summaries
    case MMHG = 'mmHg';

    //SI
    case PA = 'Pa';
    case KPA = 'kPa';

    //US engineering
    case PSI = 'psi';

    //Meteorology/oceanography
    case MB = 'mb';
}
