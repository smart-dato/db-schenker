<?php

declare(strict_types=1);

namespace SmartDato\DbSchenker\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmartDato\DbSchenker\DbSchenker
 */
final class DbSchenker extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SmartDato\DbSchenker\DbSchenker::class;
    }
}
