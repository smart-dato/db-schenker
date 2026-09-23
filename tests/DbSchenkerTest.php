<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use SmartDato\DbSchenker\Data\AddressData;
use SmartDato\DbSchenker\Data\ShipmentData;
use SmartDato\DbSchenker\Data\ShippingPartyData;
use SmartDato\DbSchenker\DbSchenker;
use SmartDato\DbSchenker\Facades\DbSchenker as DbSchenkerFacade;
use SmartDato\DbSchenker\Requests\SaveRequest;
use SmartDato\DbSchenker\Requests\SubmitRequest;

function dbSchenkerShipment(): ShipmentData
{
    $party = new ShippingPartyData(new AddressData(
        name: 'Jane Doe',
        phone: '000000',
        street: 'Hauptstrasse',
        streetNumber: '5',
        city: 'Wien',
        countryCode: 'AT',
        personType: 'PERSON_TYPE',
        postalCode: '1010',
    ));

    return new ShipmentData(
        productCode: 'PRODUCT',
        incoterm: 'DAP',
        shipper: $party,
        consignee: $party,
        packages: [],
        files: [],
    );
}

it('saves a booking', function () {
    $mockClient = new MockClient([
        SaveRequest::class => MockResponse::make(['id' => 'booking-1']),
    ]);

    $dbSchenker = new DbSchenker(url: 'https://db-schenker.test', token: 'token');
    $dbSchenker->connector->withMockClient($mockClient);

    $response = $dbSchenker->save(dbSchenkerShipment());

    expect($response->json('id'))->toBe('booking-1');

    $mockClient->assertSent(fn (SaveRequest $request, $response): bool => $response->getPendingRequest()->getUrl() === 'https://db-schenker.test/api/booking/parcel/save');
});

it('submits a booking', function () {
    $mockClient = new MockClient([
        SubmitRequest::class => MockResponse::make(['id' => 'booking-1']),
    ]);

    $dbSchenker = new DbSchenker(url: 'https://db-schenker.test', token: 'token');
    $dbSchenker->connector->withMockClient($mockClient);

    $dbSchenker->submit(dbSchenkerShipment());

    $mockClient->assertSent(SubmitRequest::class);
});

it('resolves the facade with the configured connection', function () {
    config()->set('db-schenker.base_url', 'https://db-schenker.test');
    config()->set('db-schenker.token', 'config-token');

    $pendingRequest = DbSchenkerFacade::getFacadeRoot()->connector->createPendingRequest(new SubmitRequest(dbSchenkerShipment()));

    expect($pendingRequest)->toBeInstanceOf(PendingRequest::class)
        ->and($pendingRequest->getUrl())->toBe('https://db-schenker.test/api/booking/parcel/submit')
        ->and($pendingRequest->headers()->get('Authorization'))->toBe('Bearer config-token');
});

it('has no whitespace in the default base url', function () {
    $config = require __DIR__.'/../config/db-schenker.php';

    expect($config['base_url'])->toBe(mb_trim($config['base_url']));
});
