<?php

namespace Generic;

/**
 * @template Related
 */
class ModelOf
{
    /**
     * @param class-string<Related> $ref
     */
    public function __construct(string $ref)
    {
    }

    /**
     * @param Related $ref
     * @return self<Related>
     */
    public static function from(object $ref)
    {
    }

    /**
     * @return Related
     */
    function related() {}
    function suggest() {}
}

/**
 * @var $of ModelOf<\DateTime>
 */
