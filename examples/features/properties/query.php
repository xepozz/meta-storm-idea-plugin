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
        static function do(): PostQuery{}
    }

    Post::find()->select('prop2');

    /**
     * @var $post PostQuery|Post
     */
    $post = Post::find();

    $post->select('');
}
