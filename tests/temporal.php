<?php

namespace Tests;

use Framework\WorkflowClient;
use Framework\WorkflowInterface;
use Framework\WorkflowMethod;

#[WorkflowInterface]
class TestFoo
{
    #[WorkflowMethod('test-bar')]
    public function testBar()
    {
        echo "test";
    }
}


$workflowClient = new WorkflowClient();
$workflowClient->newUntypedWorkflowStub('test-bar');