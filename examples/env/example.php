<?php

namespace Env {
    putenv('META=ok');
    class EnvReader { public function get(string $name){ } }

    $reader = new EnvReader();
    $reader->get('SHELL_VERBOSITY');
}
