<?php 

namespace Dealroadshow\Skaffold\Data\Collection;

use Dealroadshow\Skaffold\TestCase;
use JsonSerializable;

class TestCaseList implements JsonSerializable
{
    /**
     * @var TestCase[]
     */
    private array $items = [];

    public function __construct()
    {
        $this->clear();
    }

    public function add(TestCase $value): self
    {
        $this->items[] = $value;

        return $this;
    }

    /**
     * @var TestCase[] $items
     *
     * @return self
     */
    public function addAll(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    /**
     * @return TestCase[]
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
