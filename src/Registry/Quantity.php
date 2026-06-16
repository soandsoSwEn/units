<?php

namespace Soandso\Units\Registry;

final class Quantity
{
    /**
     * @var array<string, QuantityMetadata>
     */
    private static array $items = [];

    public static function register(QuantityMetadata $metadata,): void
    {
        self::$items[$metadata->name] = $metadata;
    }

    public static function has(string $name): bool
    {
        return isset(self::$items[$name]);
    }

    public static function get(string $name): ?QuantityMetadata
    {
        return self::$items[$name] ?? null;
    }

    /**
     * @return array<string, QuantityMetadata>
     */
    public static function all(): array
    {
        return self::$items;
    }
}