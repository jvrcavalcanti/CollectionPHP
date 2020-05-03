<?php

namespace CollectionPHP\Test;

use CollectionPHP\ItemCollection;

class User implements ItemCollection
{
    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function equal($other): bool
    {
        if ($other->name == $this->name && $other->age == $this->age) {
            return true;
        }

        return false;
    }
}