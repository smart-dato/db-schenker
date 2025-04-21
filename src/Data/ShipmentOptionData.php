<?php

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

class ShipmentOptionData extends Data
{
    public function __construct(
        protected string $name,
        protected ?float $amount = null,
    ) {}

    public function build(): array
    {
        $data = [
            'name' => $this->name,
        ];

        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }

        return $data;
    }
}
