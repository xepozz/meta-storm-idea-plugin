<?php

namespace Framework {
    use Attribute;

    #[Attribute(Attribute::TARGET_CLASS|Attribute::IS_REPEATABLE)]
    class Command { public function __construct(string $name){} }
    #[Attribute(Attribute::TARGET_CLASS)]
    class Tag { public function __construct(string $name){} }

    class Container{ public function getCommand(string $name):mixed {} }

    #[Attribute(Attribute::TARGET_CLASS)]
    class ClassMarker {}
    #[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
    class AttributeValueMarker { public function __construct(string $name){} }

    interface AttributeArgumentValueInterface {
        public function attributeArgumentValue(string $name);
    }
    interface ClientInterface extends AttributeArgumentValueInterface {
        public function attributeArgumentValue(string $name);
        public function attributeClass(string $name);
    }
    class Client implements ClientInterface {
        public function attributeArgumentValue(string $name){}
        public function attributeClass(string $name){}
    }
}

namespace App {
    use Framework\Command;
    use Framework\Container;
    use Framework\Tag;
    use Framework\Client;
    use Framework\ClassMarker;
    use Framework\AttributeValueMarker;

    #[Tag('tag_logger')]
    #[Command('app')]
    #[Command('view')]
    class FileLogger {}
    #[Command('app')]
    #[Command('index')]
    class FooRenderer {}

    #[ClassMarker]
    class MyRenderer {}

    #[ClassMarker]
    class Foo
    {
        #[AttributeValueMarker('method-baaaaar2')]
        #[AttributeValueMarker('workflow-type')]
        #[AttributeValueMarker]
        public function bar()
        {
            echo "test";
        }
    }

    #[ClassMarker]
    interface FooInterface
    {}

    $a = new #[ClassMarker] class {};
    $b = new #[ClassMarker] class {#[AttributeValueMarker('workflow-calc')]public function calc(){}};

    $client = new Client('Foo');
    $client->attributeArgumentValue('');
    $client->attributeClass()

}
