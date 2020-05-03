<?php

namespace CollectionPHP;

use Countable;
use Iterator;

abstract class Collection extends ArrayList
{
    protected int $position = 0;
    protected array $items = [];

    public function checkInstance($item): bool
    {
        return $item instanceof ItemCollection;
    }

    public function deleteByValue($other): void
    {
        foreach($this->items as $key => $item) {
            if ($other->equal($item)) {
                $this->deleteByKey($key);
                break;
            }
        }
    }

    public function getByValue($other)
    {
        foreach($this->items as $key => $item) {
            if ($other->equal($item)) {
                return $item;
            }
        }

        return null;
    }
}