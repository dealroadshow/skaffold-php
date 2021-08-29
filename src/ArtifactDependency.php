<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes a specific build dependency for an artifact.
 */
class ArtifactDependency implements JsonSerializable
{
    /**
     * a token that is replaced with the image reference in the builder definition
     * files. For example, the `docker` builder will use the alias as a build-arg key.
     * Defaults to the value of `image`.
     */
    private string|null $alias = null;

    /**
     * a reference to an artifact's image name.
     */
    private string $image;

    public function __construct(string $image)
    {
        $this->image = $image;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'alias' => $this->alias,
            'image' => $this->image,
        ];
    }
}
