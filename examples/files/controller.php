<?php

class Controller extends BaseController
{
    public function action()
    {
        $this->renderer->render('views/index.php');
        $this->render('views/index.php');
    }

    private function render(string $view)
    {
        $this->renderer->render($view);
    }

    public static function paint()
    {
        $c = new self;
        $c->renderBlade("views/index");
        $c->render('views/index.php');
        (new self)->render('views/index.php');
        (new static)->render('views/index.php');
        $c->renderProject('index');
        $c->renderThemed('');
        $c->renderAppend('');
        $c->renderIcon('icons/users.svg');
    }
}

class SubController extends Controller
{
    public function action()
    {
        $this->render('views/index.php');
        (new static)->render('views/index.php');
        (new parent)->render('views/index.php');
        (new parent)->xpath('index');
        (new parent)->xpathDir('index');
        (new parent)->xpathFile('index');
    }
}

class Renderer
{
    public function render(string $file)
    {
    }
}

class BaseController
{
    protected Renderer $renderer;
}