<?php

namespace Json {
    class JsonReader { public function read(string $key) {} }

    $resolver = new JsonReader();
    $resolver->read('');
}