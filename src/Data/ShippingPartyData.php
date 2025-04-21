<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

final class ShippingPartyData extends Data
{
    public function __construct(
        protected AddressData $address,
    ) {}

    public function build(): array
    {
        return [
            'address' => $this->address->build(),
        ];
    }
}
