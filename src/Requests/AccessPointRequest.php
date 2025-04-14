<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class AccessPointRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
