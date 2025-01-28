<?php

namespace ActiveQuery {
    class PostQuery
    {
        public $prop1 = null;
        function select(string $field): PostQuery{}
    }

    /**
     * @property string $docProp
     */
    class Post
    {
        public $prop2 = null;
        static function find(): PostQuery{}
    }

    Post::find()->select('p');
}
