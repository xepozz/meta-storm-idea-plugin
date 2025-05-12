<?php

namespace Yaml {
    class YamlReader { public function read(string $key) {} }

    $resolver = new YamlReader();
    $resolver->read('');
}