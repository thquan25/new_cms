<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    // Resolve Memory leak problem when run PHPUnit
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
        $this->em = null;
        gc_collect_cycles();
    }
}
