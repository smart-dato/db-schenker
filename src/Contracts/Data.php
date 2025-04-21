<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Contracts;

abstract class Data
{
    abstract public function build(): array;
}
