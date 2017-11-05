<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 23/09/2017
 * Time: 01:34
 */

namespace Tim\Smol;


class WidgetGroup
{

    private $widgets = [];

    public function add($name, $config = [])
    {
        $widget = app()->widgets->get($name);

        return $this->widgets[] = $widget;
    }

    // Smol::group('dashboard')->add('admin.analytics')->config()->position()

    private function getSortedWidgets()
    {
        // sort stuff

        return $this->widgets;
    }

    public function render()
    {
        $output = '';

        foreach ($this->getSortedWidgets() as $widget)
            $output .= $widget->render() . "\n";

        return $output;
    }

}