<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * patch to be applied by a profile.
 */
class JSONPatch implements JsonSerializable
{
    /**
     * source position in the yaml, used for `copy` or `move` operations.
     */
    private string|null $from = null;

    /**
     * operation carried by the patch: `add`, `remove`, `replace`, `move`, `copy` or
     * `test`.
     */
    private string|null $op = null;

    /**
     * position in the yaml where the operation takes place. For example, this targets
     * the `dockerfile` of the first artifact built.
     */
    private string $path;

    /**
     * value to apply. Can be any portion of yaml.
     */
    private mixed $value;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function getOp(): string|null
    {
        return $this->op;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function setOp(string $op): self
    {
        $this->op = $op;

        return $this;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'from' => $this->from,
            'op' => $this->op,
            'path' => $this->path,
            'value' => $this->value,
        ];
    }
}
