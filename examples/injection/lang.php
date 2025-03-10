<?php

class LangControl {
    public function regexp(string $value){}
    public function css(string $value){}
    public function html(string $value){}
    public function sql(string $value){}
    public function php(string $value){}
}

$control = new LangControl();
$control->regexp('[a-z]add+');
$control->css('div.class{display: flex;}');
$control->html('div*5');
$control->sql('select 1');
$control->php('<?= "string" . random_int(1, 2);');
$control->php('echo 123;');
$control->php(<<<'TEXT'
/**
 * @re
 */
TEXT);
$control->php("
echo 123;
");
$control->php('
echo 123;
');
$control->htmla('div*5');
