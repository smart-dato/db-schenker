<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Contracts;

abstract class Data
{
    /** @return array<string, mixed> */
    abstract public function build(): array;
}
