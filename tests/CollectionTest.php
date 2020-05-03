<?php

use CollectionPHP\Test\User;
use CollectionPHP\Test\UserCollection;
use PHPUnit\Framework\TestCase;

final class CollectionTest extends TestCase
{
    public function testAdd()
    {
        $colle = new UserCollection;

        $user = new User("Robert", 40);

        $colle->add($user);

        $this->assertEquals(
            $colle->getByValue($user),
            $user
        );
    }

    public function testGetByValue()
    {
        $colle = new UserCollection;

        $user = new User("Robert", 40);

        $colle->add($user);

        $this->assertEquals(
            $colle->getByValue($user),
            $user
        );
    }

    public function testCount()
    {
        $colle = new UserCollection;
        
        for($i = 0; $i < 10; $i ++) {
            $colle->add(new User("Sla" . $i, $i * 10));
        }

        $this->assertEquals(count($colle), 10);
    }

}