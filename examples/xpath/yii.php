<?php
namespace Framework\QueryBuilder {
 class Query
 {
     public function hasOne(string $class, array $link) { }
 }
}

namespace App {

    use Framework\QueryBuilder\Query;

    /**
     * @property $id
     * @property $user_id
     */
    class Post extends Query {
        public function getUser()
        {
            $this->hasOne(User::class, ['id' => 'user_id']);
        }
    }
    /**
     * @property $id
     * @property $post_id
     */
    class User extends Query {
        public function getPost()
        {
            $this->hasOne(Post::class, ['id' => 'post_id']);
        }
    }
}
