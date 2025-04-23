<?php
namespace App\Controller;

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
        view("views/index");
        $c = new self;
        $c->renderBlade("views/index");
        $c->render('views/index.php');
        (new self)->render('views/index.php');
        (new static)->render('views/index.php');
        $c->renderThemed('');
        $c->renderAppend('');
        $c->renderAlias('@files/views/index');
        $c->renderPrefixed('dark-index');
        $c->renderAlias('@root/examples/files/views/index');
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