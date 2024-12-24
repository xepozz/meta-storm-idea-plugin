<?php

namespace Framework {
    use Attribute;

    #[Attribute(Attribute::TARGET_CLASS|Attribute::IS_REPEATABLE)]
    class Command { public function __construct(string $name){} }
    #[Attribute(Attribute::TARGET_CLASS)]
    class Tag { public function __construct(string $name){} }

    class Container{ public function getCommand(string $name):mixed {} }

}

namespace App {
    use Framework\Command;
    use Framework\Container;
    use Framework\Tag;

    #[Tag('tag_logger')]
    #[Command('app')]
    #[Command('view')]
    class FileLogger {}
    #[Command('app')]
    #[Command('index')]
    class FooRenderer {}


    $c = new Container;
    $command = $c->getCommand('view'); // $value to be expected FileLogger class
    $tag = $c->getTag('tag_logger'); // $value to be expected FileLogger class
}