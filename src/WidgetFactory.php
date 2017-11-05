<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 23/09/2017
 * Time: 01:25
 */

namespace Tim\Smol;

use Tim\Smol\Exceptions\WidgetException;


class WidgetFactory
{

    /**
     * Container for all declared widgets
     *
     * @var array
     */
    protected $widgets = [];

    /**
     * Container for created groups
     *
     * @var array
     */
    protected $groups = [];

    /**
     * Declares a new widget
     * 
     * @param $name
     * @param $class
     * @return $this
     */
    public function create($name, $class)
    {
        $this->widgets[$name] = $class;

        return $this;
    }

    /**
     * Checks existence of widget
     *
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return array_has($this->widgets, $name);
    }

    /**
     * Retrieves an instance of a widget
     * 
     * @param $name
     * @return mixed
     */
    public function get($name, $config = [])
    {
        $class = array_get($this->widgets, $name);

        if (!$class)
            throw new WidgetException("Widget '$name' does not exist");

        return new $class($config);
    }

    /**
     * Gets desired group
     * 
     * @param $group
     * @return mixed
     */
    public function group($group)
    {
        if (!array_has($this->groups, $group))
            $this->groups[$group] = new WidgetGroup();

        return array_get($this->groups, $group);
    }



}