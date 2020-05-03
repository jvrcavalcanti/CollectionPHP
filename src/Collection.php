<?php

namespace CollectionPHP;

use Countable;
use Iterator;

abstract class Collection implements Countable, Iterator
{
    protected int $position = 0;

    protected array $items = [];

    abstract public function checkInstance(ItemCollection $obj): bool;

    public function add(ItemCollection $obj, ?int $key = null): void
    {
        if (!$this->checkInstance($obj)) {
            throw new \TypeError("Type collection incorrect");
        }

        if ($key) {
            $this->items[$key] = $obj;
            return;
        }
        
        $this->items[] = $obj;
    }

    public function deleteByKey(int $key): void
    {
        if (!isset($this->items[$key])) {
            throw new KeyInvalidException("Invalid key $key.");
        }

        unset($this->items[$key]);
    }

    public function deleteByValue(ItemCollection $other): void
    {
        foreach($this->items as $key => $item) {
            if ($other->equal($item)) {
                $this->deleteByKey($key);
                break;
            }
        }
    }

    public function getByKey(int $key)
    {
        if (!isset($this->items[$key])) {
            throw new KeyInvalidException("Invalid key $key.");
        }

        return $this->items[$key];
    }

    public function getByValue(ItemCollection $other): ?ItemCollection
    {
        foreach($this->items as $key => $item) {
            if ($other->equal($item)) {
                return $item;
            }
        }
    }

    public function getKeys(): array
    {
        return array_keys($this->items);
    }

    public function keyExists(int $key): bool
    {
        return isset($this->items[$key]);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    function valid(): bool
    {
        return isset($this->items[$this->position]);
    }
}