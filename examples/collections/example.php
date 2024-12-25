<?php

namespace Framework {
    use Attribute;

    #[Attribute(Attribute::TARGET_CLASS|Attribute::IS_REPEATABLE)]
    class Command { public function __construct(string $name){} }
    #[Attribute(Attribute::TARGET_CLASS)]
    class Tag { public function __construct(string $name){} }

    class Container{ public function getCommand(string $name):mixed {} }

    #[Attribute(Attribute::TARGET_CLASS)]
    class WorkflowInterface {}
    #[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
    class WorkflowMethod { public function __construct(string $name){} }

    class WorkflowClient {
        public function newUntypedWorkflowStub(string $name){}
        public function newWorkflow(string $name){}
    }
}

namespace App {
    use Framework\Command;
    use Framework\Container;
    use Framework\Tag;
    use Framework\WorkflowClient;
    use Framework\WorkflowInterface;
    use Framework\WorkflowMethod;

    #[Tag('tag_logger')]
    #[Command('app')]
    #[Command('view')]
    class FileLogger {}
    #[Command('app')]
    #[Command('index')]
    class FooRenderer {}

    #[WorkflowInterface]
    class MyRenderer {}


    $c = new Container;
    $command = $c->getCommand('view'); // $value to be expected FileLogger class
    $tag = $c->getTag('tag_logger'); // $value to be expected FileLogger class

    #[WorkflowInterface]
    class Foo
    {
        #[WorkflowMethod('method-baaaaar')]
        #[WorkflowMethod('workflow-type')]
        public function bar()
        {
            echo "test";
        }
    }


    $workflowClient = new WorkflowClient();
    $workflowClient->newUntypedWorkflowStub('workflow-type');
    $workflowClient->newWorkflow(\App\MyRenderer::class);

}
