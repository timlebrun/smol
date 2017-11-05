<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 23/09/2017
 * Time: 01:29
 */

namespace Tim\Smol\Widgets;


abstract class SmolWidget
{

    /**
     * Config array
     * 
     * @var array
     */
    private $config = [];

    /**
     * Position index in a group
     * 
     * @var
     */
    private $position;

    /**
     * SmolWidget constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     *
     *
     * @param array $config
     * @return $this
     */
    public function config(array $config)
    {
        $this->config = array_merge($this->config, $config);

        return $this;
    }

    /**
     * Sets position in a group
     *
     * @param int $position
     * @return $this
     */
    public function position(int $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Renders the widget
     */
    abstract public function render();

}