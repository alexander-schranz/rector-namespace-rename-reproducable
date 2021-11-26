<?php

namespace App\Second\OldNamespace;

use App\Second\OldNamespace\More\More;

class Test
{
    public function get(): More
    {
        return new More();
    }
}
