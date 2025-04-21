<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

final class ShipmentData extends Data
{
    /**
     * @param  PackageData[]  $packages
     * @param  ShipmentOptionData[]  $shipmentOptions
     * @param  FileData[]  $files
     */
    public function __construct(
        protected string $productCode,
        protected string $incoterm,
        protected ShippingPartyData $shipper,
        protected ShippingPartyData $consignee,
        protected array $packages,
        protected array $files,
        protected ?array $shipmentOptions = null,
        protected ?string $labelFormat = null,
    ) {}

    public function build(): array
    {
        $data = [
            'productCode' => $this->productCode,
            'incoterm' => $this->incoterm,
            'shipper' => $this->shipper->build(),
            'consignee' => $this->consignee->build(),
            'packages' => array_map(fn ($package) => $package->build(), $this->packages),
            'files' => array_map(fn ($file) => $file->build(), $this->files),
        ];

        if (! empty($this->shipmentOptions)) {
            $data['shipmentOptions'] = array_map(fn ($option) => $option->build(), $this->shipmentOptions);
        }

        if (! empty($this->labelFormat)) {
            $data['labelFormat'] = $this->labelFormat;
        }

        return $data;
    }
}
