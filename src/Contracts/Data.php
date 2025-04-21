<?php

namespace SmartDato\DbSchenker\Contracts;

abstract class Data
{
    abstract public function build(): array;
}
