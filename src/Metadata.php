<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * holds an optional name of the project.
 */
class Metadata implements JsonSerializable
{
    /**
     * an identifier for the project.
     */
    private string|null $name = null;

    public function __construct()
    {
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
