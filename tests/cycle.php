<?php

namespace Tests;

use Framework\WorkflowClient;
use Framework\WorkflowInterface;
use Framework\WorkflowMethod;

#[WorkflowInterface]
class CycleFoo
{
    #[WorkflowMethod('test-cycle-bar')]
    public function cycleBar()
    {
        echo "test";
    }
}


$workflowClient = new WorkflowClient();
$workflowClient->newUntypedWorkflowStub('test-bar');