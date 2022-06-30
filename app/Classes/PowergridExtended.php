<?php

namespace App\Classes;

use PowerComponents\LivewirePowerGrid\{Button};

class PowergridExtented extends Button{
    public string $onclick ='';

    public function onclick(string $onclick){
        $this->onclick = $onclick;

        return $this;
    }
}