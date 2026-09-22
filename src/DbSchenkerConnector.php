<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker;

use RuntimeException;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

final class DbSchenkerConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected readonly ?string $url = null,
        protected readonly ?string $token = null,
    ) {}

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return $this->url ?? $this->stringConfig('db-schenker.base_url');
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(
            token: $this->token ?? $this->stringConfig('db-schenker.token'),
        );
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

    private function stringConfig(string $key): string
    {
        $value = config($key);

        if (! is_string($value)) {
            throw new RuntimeException("Config value [{$key}] must be a string.");
        }

        return $value;
    }
}
