<?php

$items = [
    [
        'key' => 'help',
        'tail' => ' tail text',
        'references' => [
            [
                'type' => 'class',
                'class' => \stdClass::class,
            ],
            [
                'type' => 'method',
                'class' => \DateTimeImmutable::class,
                'method' => 'add',
            ],
            [
                'type' => 'property',
                'class' => \DatePeriod::class,
                'property' => 'interval',
            ],
            [
                'type' => 'constant',
                'class' => \DateTime::class,
                'constant' => 'ATOM',
            ],
            [
                'type' => 'file',
                'file' => __FILE__,
            ],
            [
                'type' => 'file',
                'path' => '$project/.env',
            ],
            [
                'type' => 'file',
                'path' => '$directory/run.php',
            ],
        ]
    ],
    [
        'key' => 'pleh',
        'tail' => ' tail text',
    ],
];
$result = [
    'items' => $items,
];

echo json_encode($result);
