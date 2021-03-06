<?php 

namespace Dealroadshow\Skaffold\Data\Collection;

use Dealroadshow\Skaffold\CustomTest;
use JsonSerializable;

class CustomTestList implements JsonSerializable
{
    /**
     * @var CustomTest[]
     */
    private array $items = [];

    public function __construct()
    {
        $this->clear();
    }

    public function add(CustomTest $value): self
    {
        $this->items[] = $value;

        return $this;
    }

    /**
     * @var CustomTest[] $items
     *
     * @return self
     */
    public function addAll(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    /**
     * @return CustomTest[]
     */
    public function all(): array
    {
        return $this->items;
    }

    public function clear(): self
    {
        $this->items = [];

        return $this;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
