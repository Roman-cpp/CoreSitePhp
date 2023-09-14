<?php

namespace Core\Model;

class CollectionDB
{
    private array $mainArray = [];

    public function length(): int
    {
        return count($this->mainArray);
    }

    public function push($item): void
    {
        $this->mainArray[] = $item;
    }
}
