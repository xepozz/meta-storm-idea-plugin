<?php


namespace {
    function render(string $view, mixed ...$params)
    {
    }
}


namespace App {
    function render(string $view)
    {
    }
}

namespace Usage {
    render('views/index.php');
    render('./views/index.php');
    render('./../files/views/index.php',  param1: true);
    \App\render('views/index.php');
}