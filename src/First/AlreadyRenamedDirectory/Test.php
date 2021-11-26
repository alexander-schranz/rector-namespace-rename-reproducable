<?php

namespace App\First\OldNamespace;

use App\First\OldNamespace\More\More;

class Test
{
    public function get(): More
    {
        return new More();
    }
}
