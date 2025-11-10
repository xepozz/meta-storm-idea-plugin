<?php

namespace Json {
    class JsonReader {
        public function read(string $key) {}
        public function keys(string $key) {}
    }

    $resolver = new JsonReader();
    $resolver->read('');
    $resolver->keys('');
}