<?php

namespace Framework {
    use Attribute;

    #[Attribute(Attribute::TARGET_CLASS|Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
    class Route { public function __construct(string $name, string $method) { }  }


    new ClassReflection('ClassMarker');
    new InterfaceReflection('');
}

namespace Usage {

    use Framework\Route;

    #[Route("my-index", method: '')]
    class MyController
    {


    }
}
