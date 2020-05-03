<?php

use CollectionPHP\StringList;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testCheckInstance()
    {
        $result = false;
        try {
            $list = new StringList();

            $list->add(1);
        } catch (\TypeError $e) {
            $result = true;
        }
        $this->assertTrue($result);
    }

    public function testGetByValue()
    {
        $list = new StringList();

        $list->add("aa");
        $list->add("bb");

        $this->assertEquals(
            "aa",
            $list->getByValue("aa")
        );
    }

}