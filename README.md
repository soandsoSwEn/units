# Units

PHP library for meteorological unit conversion.

## Features

* Temperature conversion
* Wind speed conversion
* Atmospheric pressure conversion
* Precipitation conversion
* Distance conversion
* Support for strongly typed enums
* Fluent API
* Unit metadata registry
* Framework independent
* PHP 8.4+

---

## Installation

Install via Composer:

```bash
composer require soandso/units
```

---

## Quick Start

```php
require __DIR__ . '/vendor/autoload.php';

use Soandso\Units\Bootstrap;

Bootstrap::init();
```

---

## Supported Quantities

Retrieve metadata for a quantity:

```php
use Soandso\Units\Registry\Quantity;
use Soandso\Units\Unit;

$temperature = Quantity::get(Unit::TEMPERATURE);

$temperature->name;
$temperature->description;
$temperature->class;

$temperature->units;
```

Example output:

```text
Temperature
Air temperature units
Soandso\Units\Value\Temperature

[
    "C",
    "F",
    "K"
]
```

---

## Temperature Conversion

### Fluent API

```php
use Soandso\Units\Value\Temperature;

Temperature::c(20)
    ->toF()
    ->value(); //68
```

### Generic Conversion

```php
use Soandso\Units\Value\Temperature;
use Soandso\Units\Enum\Temperature as TemperatureUnit;

Temperature::c(20)
    ->convertTo(TemperatureUnit::F)
    ->value(); //68
```

---

## Creating Values

Values can be created using named constructors:

```php
Temperature::c(20);
Temperature::f(68);
Temperature::k(293.15);
```

---

## Working with Value Objects

```php
$temperature = Temperature::c(20);

$temperature->value();
$temperature->unit()->value;
```

---

## Available Quantities

Depending on installed version, the library may support:

* Temperature
* Pressure
* Wind Speed
* Precipitation
* Distance
* Visibility
* Humidity
* Cloud Base Height

Example:

```php
use Soandso\Units\Enum\Unit;
use Soandso\Units\Registry\Quantity;

$quantity = Quantity::get(Unit::PRESSURE);
```

---

## Registry

The registry provides metadata about all supported quantities.

```php
use Soandso\Units\Registry\Quantity;

$all = Quantity::all();
```

---

## Example

```php
use Soandso\Units\Value\Temperature;

$celsius = Temperature::c(20);

$celsius->toF()->value(); //68
$celsius->toK()->value(); //293.15
```

---

## Requirements

* PHP 8.4+
* Composer

---

## License

Grouping is licensed under the GPLv2 License (https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
