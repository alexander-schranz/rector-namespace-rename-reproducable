<?php

namespace App\Tests\First;

use App\Second\OldNamespace\More\More;
use PHPUnit\Framework\TestCase;

class MoreTest extends TestCase
{
    public function testMore(): void
    {
        $this->assertTrue(class_exists(More::class));
    }
}
