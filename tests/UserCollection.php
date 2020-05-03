<?php

namespace CollectionPHP\Test;

use CollectionPHP\Collection;

class UserCollection extends Collection
{
    public function checkInstance($item): bool
    {
        return $item instanceof User ? true : false;
    }
}