<?php 

namespace Dealroadshow\Skaffold\Data\Collection;

use JsonSerializable;

class MixedList implements JsonSerializable
{
    /**
     * @var mixed[]
     */
    private array $items = [];

    public function __construct()
    {
        $this->clear();
    }

    public function add(mixed $value): self
    {
        $this->items[] = $value;

        return $this;
    }

    /**
     * @var mixed[] $items
     *
     * @return self
     */
    public function addAll(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    /**
     * @return mixed[]
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
