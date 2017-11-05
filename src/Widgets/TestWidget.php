<?php

namespace Tim\Smol\Widgets;


class TestWidget extends SmolWidget
{

    public function render()
    {
        return view('smol::widgets.test');
    }
    
}