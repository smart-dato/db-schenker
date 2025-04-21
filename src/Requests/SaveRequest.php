<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\DbSchenker\Data\ShipmentData;

final class SaveRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        protected ShipmentData $data
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/booking/parcel/save';
    }

    protected function defaultBody(): array
    {
        return $this->data->build();
    }
}
