<?php

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

class PackageData extends Data
{
    public function __construct(
        protected int $codAmount,
        protected string $description,
        protected string $packagingCode,
        protected float $weight,
        protected string $weightUnit,
        protected float $length,
        protected float $width,
        protected float $height,
        protected string $dimensionUnit,
        protected int $quantity,
    ) {}

    public function build(): array
    {
        return [
            'codAmount' => $this->codAmount,
            'description' => $this->description,
            'packagingCode' => $this->packagingCode,
            'weight' => $this->weight,
            'weightUnit' => $this->weightUnit,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'dimensionUnit' => $this->dimensionUnit,
            'quantity' => $this->quantity,
        ];
    }
}
