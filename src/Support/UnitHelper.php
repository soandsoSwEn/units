<?php

namespace Soandso\Units\Support;

use BackedEnum;

final class UnitHelper
{
    /**
     * @param class-string<BackedEnum> $enum
     * @return array<string>
     */
    public static function values(string $enum): array
    {
        return array_map(
            static fn (BackedEnum $case) => $case->value,
            $enum::cases(),
        );
    }
}
