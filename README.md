# DB Schenker SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/db-schenker.svg?style=flat-square)](https://packagist.org/packages/smart-dato/db-schenker)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/db-schenker/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/db-schenker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/db-schenker/code-style.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/db-schenker/actions?query=workflow%3A%22Code+style%22+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/db-schenker.svg?style=flat-square)](https://packagist.org/packages/smart-dato/db-schenker)

A Laravel package for the DB Schenker Booking Parcel Customer API, built on [Saloon](https://docs.saloon.dev). It saves and submits parcel bookings.

## Requirements

- PHP 8.2+
- Laravel 10 – 13

## Installation

```bash
composer require smart-dato/db-schenker
```

Publish the config file:

```bash
php artisan vendor:publish --tag="db-schenker-config"
```

## Configuration

```dotenv
DB_SCHENKER_BASE_URL=https://wwwtest.dbschenker.com/nges-portal
DB_SCHENKER_TOKEN=your-api-token
```

The test environment is `https://wwwtest.dbschenker.com/nges-portal`; production is `https://www.dbschenker.com/nges-portal`.

## Usage

`DbSchenker` reads the base URL and token from config, or you can pass them explicitly. The `DbSchenker` facade resolves the same class with the configured values.

```php
use SmartDato\DbSchenker\DbSchenker;

$dbSchenker = new DbSchenker();

// or: new DbSchenker(url: 'https://…', token: '…');
```

### Build a shipment

```php
use SmartDato\DbSchenker\Data\AddressData;
use SmartDato\DbSchenker\Data\PackageData;
use SmartDato\DbSchenker\Data\ShipmentData;
use SmartDato\DbSchenker\Data\ShipmentOptionData;
use SmartDato\DbSchenker\Data\ShippingPartyData;

$shipment = new ShipmentData(
    productCode: 'your-product-code',
    incoterm: 'DAP',
    shipper: new ShippingPartyData(new AddressData(
        name: 'Sender GmbH',
        phone: '+49 30 000000',
        street: 'Musterstraße',
        streetNumber: '1',
        city: 'Berlin',
        countryCode: 'DE',
        personType: 'your-person-type',
        postalCode: '10115',
    )),
    consignee: new ShippingPartyData(new AddressData(
        name: 'Jane Doe',
        phone: '+43 1 000000',
        street: 'Hauptstraße',
        streetNumber: '5',
        city: 'Wien',
        countryCode: 'AT',
        personType: 'your-person-type',
        postalCode: '1010',
    )),
    packages: [
        new PackageData(
            codAmount: 0,
            description: 'Books',
            packagingCode: 'your-packaging-code',
            weight: 2.5,
            weightUnit: 'your-weight-unit',
            length: 30,
            width: 20,
            height: 10,
            dimensionUnit: 'your-dimension-unit',
            quantity: 1,
        ),
    ],
    files: [], // FileData instances for accompanying documents
    shipmentOptions: [new ShipmentOptionData(name: 'your-option')],
    labelFormat: 'your-label-format',
);
```

`shipmentOptions`, `labelFormat` and the optional address fields are omitted from the request body when left empty.

Codes such as `personType`, `weightUnit`, `dimensionUnit`, `packagingCode` and `labelFormat` are sent to DB Schenker unchanged — the SDK defines no enums for them, so use the values from your DB Schenker integration documentation.

### Save and submit a booking

```php
// Save the booking without submitting it — POST /api/booking/parcel/save
$response = $dbSchenker->save($shipment);

// Submit the booking — POST /api/booking/parcel/submit
$response = $dbSchenker->submit($shipment);

$response->json();
```

Both return a Saloon `Response`, so the usual `status()`, `json()` and `throw()` are available. The underlying `DbSchenkerConnector` is available as `$dbSchenker->connector` if you want to send `SaveRequest` / `SubmitRequest` yourself.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SmartDato](https://github.com/smart-dato)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
