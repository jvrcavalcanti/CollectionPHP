<?php

namespace CollectionPHP;

use Countable;
use Iterator;

abstract class ArrayList implements Iterator, Countable
{
    protected int $position = 0;
    protected array $items = [];

    abstract public function checkInstance($item): bool;
    abstract public function deleteByValue($item): void;
    abstract public function getByValue($item);

    public function __construct(array $data = [])
    {
        foreach($data as $el) {
            $this->add($el);
        }
    }

    public function add($item, ?int $key = null): void
    {
        if (!$this->checkInstance($item)) {
            throw new \TypeError("Type collection incorrect");
        }

        if ($key) {
            $this->items[$key] = $item;
        }

        $this->items[] = $item;
    }

    public function deleteByKey(int $key): void
    {
        if (!$this->keyExists($key)) {
            throw new KeyInvalidException("Invalid key $key.");
        }

        unset($this->items[$key]);
    }

    public function getByKey(int $key)
    {
        if (!$this->keyExists($key)) {
            throw new KeyInvalidException("Invalid key $key.");
        }

        return $this->items[$key];
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

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }
}