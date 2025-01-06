<?php

namespace Arrays {
    class CollectionValues
    {
        public array $strings = ['value1', 'value2', 'value4'];
//        public array $strings = ['value1', 'value2', 'value3', 77, 10 => ['inner 1']];
    }

    class ArrayValues
    {
        public CollectionValues $collection;
        public array $strings = ['value1', 'value2', 'value5', 77, 10 => ['inner 1']];
    }


    $resolver = new ArrayValues();
    $resolver->gett('');
}