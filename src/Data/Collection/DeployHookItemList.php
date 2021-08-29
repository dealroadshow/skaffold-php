<?php 

namespace Dealroadshow\Skaffold\Data\Collection;

use Dealroadshow\Skaffold\DeployHookItem;
use JsonSerializable;

class DeployHookItemList implements JsonSerializable
{
    /**
     * @var DeployHookItem[]
     */
    private array $items = [];

    public function __construct()
    {
        $this->clear();
    }

    public function add(DeployHookItem $value): self
    {
        $this->items[] = $value;

        return $this;
    }

    /**
     * @var DeployHookItem[] $items
     *
     * @return self
     */
    public function addAll(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    /**
     * @return DeployHookItem[]
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
