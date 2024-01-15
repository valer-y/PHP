<?php

namespace App;

class Radio extends Field
{
    public function render() : string
    {
        return <<<HTML
<input type="radio" name="{$this->name}">
HTML;

    }
}