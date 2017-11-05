<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 23/09/2017
 * Time: 01:54
 */

namespace Tim\Smol\Facades;


use Illuminate\Support\Facades\Facade;

class Smol extends Facade
{

    /**
     * Get the widget factory singleton.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'widgets'; }

}