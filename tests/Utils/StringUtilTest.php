<?php

namespace App\Tests\Utils;

use App\Utils\StringUtil;
use PhpUnit\Framework\TestCase;

class StringUtilTest extends TestCase
{
    public function testSlugify()
    {
        $stringUtil = new StringUtil();
        $result = $stringUtil->slugify("Mục 1");
        $this->assertEquals('muc-1', $result);
    }
}
