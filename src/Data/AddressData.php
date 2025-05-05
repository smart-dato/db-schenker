<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Data;

use SmartDato\DbSchenker\Contracts\Data;

final class AddressData extends Data
{
    public function __construct(
        protected string $name,
        protected string $phone,
        protected string $street,
        protected string $streetNumber,
        protected string $city,
        protected string $countryCode,
        protected string $personType,
        protected ?string $email = null,
        protected ?string $stateProvinceCode = null,
        protected ?string $name2 = null,
        protected ?string $street2 = null,
        protected ?string $contactPerson = null,
        protected ?string $mobilePhone = null,
        protected ?string $postalCode = null,
    ) {}

    public function build(): array
    {
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'street' => $this->street,
            'streetNumber' => $this->streetNumber,
            'city' => $this->city,
            'countryCode' => $this->countryCode,
            'personType' => $this->personType,
        ];

        if (! empty($this->contactPerson)) {
            $data['contactPerson'] = $this->contactPerson;
        }

        if (! empty($this->mobilePhone)) {
            $data['mobilePhone'] = $this->mobilePhone;
        }

        if (! empty($this->postalCode)) {
            $data['postalCode'] = $this->postalCode;
        }

        if (! empty($this->stateProvinceCode)) {
            $data['stateProvinceCode'] = $this->stateProvinceCode;
        }

        if (! empty($this->email)) {
            $data['email'] = $this->email;
        }

        if (! empty($this->name2)) {
            $data['name2'] = $this->name2;
        }

        if (! empty($this->street2)) {
            $data['street2'] = $this->street2;
        }

        return $data;
    }
}
