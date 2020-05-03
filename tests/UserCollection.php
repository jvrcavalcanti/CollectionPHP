<?php

namespace CollectionPHP\Test;

use CollectionPHP\Collection;

class UserCollection extends Collection
{
    public function checkInstance(\CollectionPHP\ItemCollection $obj): bool
    {
        return $obj instanceof User ? true : false;
    }
}