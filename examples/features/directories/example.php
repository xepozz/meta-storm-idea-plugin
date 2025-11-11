<?php

namespace Directories {
    class DirectoryHelper { public function do(string $name){ } }

    $reader = new DirectoryHelper();
    $reader->do('test2');
    $reader->do('../directories/test2');
}
