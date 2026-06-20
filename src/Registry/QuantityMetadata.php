<?php

namespace Soandso\Units\Registry;

use Soandso\Units\Contracts\Quantity;

final readonly class QuantityMetadata
{
    /**
     * @param class-string<Quantity> $class
     * @param array<string> $units
     */
    public function __construct(
        public string $name,
        public string $class,
        public string $description,
        public array $units = [],
    ) {
    }
}
