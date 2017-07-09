<?php

/*
 * This file is part of Laravel Cuentadigital.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alariva\Cuentadigital\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Cuentadigital facade class.
 *
 */
class Cuentadigital extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cuentadigital';
    }
}
