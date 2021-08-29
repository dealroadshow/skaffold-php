<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * image config to use the FullyQualifiedImageName as param to set.
 */
class HelmFQNConfig implements JsonSerializable
{
    /**
     * defines the image config.
     */
    private string|null $property = null;

    public function __construct()
    {
    }

    public function getProperty(): string|null
    {
        return $this->property;
    }

    public function setProperty(string $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'property' => $this->property,
        ];
    }
}
