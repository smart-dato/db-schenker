<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

final class DbSchenkerConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return '';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
