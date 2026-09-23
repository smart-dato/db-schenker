<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker;

use Saloon\Http\Response;
use SmartDato\DbSchenker\Data\ShipmentData;
use SmartDato\DbSchenker\Requests\SaveRequest;
use SmartDato\DbSchenker\Requests\SubmitRequest;

final class DbSchenker
{
    public readonly DbSchenkerConnector $connector;

    public function __construct(
        ?string $url = null,
        ?string $token = null,
    ) {
        $this->connector = new DbSchenkerConnector(url: $url, token: $token);
    }

    public function save(ShipmentData $shipment): Response
    {
        return $this->connector->send(new SaveRequest($shipment));
    }

    public function submit(ShipmentData $shipment): Response
    {
        return $this->connector->send(new SubmitRequest($shipment));
    }
}
