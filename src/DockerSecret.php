<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains information about a local secret passed to `docker build`, along with
 * optional destination information.
 */
class DockerSecret implements JsonSerializable
{
    /**
     * id of the secret.
     */
    private string $id;

    /**
     * path to the secret on the host machine.
     */
    private string|null $src = null;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSrc(): string|null
    {
        return $this->src;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'src' => $this->src,
        ];
    }
}
