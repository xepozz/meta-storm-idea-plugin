<?php

namespace Moonshine {
    class Model
    {
        protected array $fillable = [
            'name',
            'text',
        ];
    }

    class Container
    {
        protected string $model = Model::class;

        public function fields(): array
        {
            return [
                (new Field())->method('name')
            ];
        }
    }

    class Field
    {
        public function method(string $column) { }
    }
}