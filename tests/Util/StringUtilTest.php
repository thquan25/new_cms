<?php

namespace App\Tests\Util;

use App\Util\StringUtil;
use App\Util\BaseTestCase;

class StringUtilTest extends BaseTestCase
{
    public function testSlugify()
    {
        $stringUtil = new StringUtil();
        $result = $stringUtil->slugify("Muc 1");
        $this->assertEquals('muc-1', $result);
    }
}
