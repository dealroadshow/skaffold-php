<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * image config in the syntax of image.repository and image.tag.
 */
class HelmConventionConfig implements JsonSerializable
{
    /**
     * separates `image.registry` to the image config syntax. Useful for some charts
     * e.g. `postgresql`.
     */
    private bool|null $explicitRegistry = null;

    public function __construct()
    {
    }

    public function getExplicitRegistry(): bool|null
    {
        return $this->explicitRegistry;
    }

    public function setExplicitRegistry(bool $explicitRegistry): self
    {
        $this->explicitRegistry = $explicitRegistry;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'explicitRegistry' => $this->explicitRegistry,
        ];
    }
}
