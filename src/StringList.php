<?php

namespace CollectionPHP;

class StringList extends ArrayList
{
    public function checkInstance($item): bool
    {
        return is_string($item);
    }

    public function getByValue($item)
    {
        foreach($this->items as $el) {
            if ($el == $item) {
                return $el;
            }
        }

        return null;
    }

    public function deleteByValue($item): void
    {
        foreach($this->items as $key => $el) {
            if ($el == $item) {
                $this->deleteByKey($key);
            }
        }
    }
}