<?php

class LangControl {
    public function regexp(string $value){}
    public function css(string $value){}
    public function html(string $value){}
}

$control = new LangControl();
$control->regexp('[a-z]add+');
$control->css('div.class{display: flex;}');
$control->html('div*5');
$control->htmla('div*5');
