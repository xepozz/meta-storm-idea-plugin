<?php


namespace {
    function render(string $view)
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
    \App\render('views/index.php');
}