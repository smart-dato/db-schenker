<?php

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

class ShippingPartyData extends Data
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
