<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * uses the `docker` CLI to create application containers in Docker.
 */
class DockerDeploy implements JsonSerializable
{
    /**
     * container images to run in Docker.
     */
    private StringList $images;

    /**
     * tells skaffold whether or not to deploy using `docker-compose`.
     */
    private bool|null $useCompose = null;

    public function __construct()
    {
        $this->images = new StringList();
    }

    public function getUseCompose(): bool|null
    {
        return $this->useCompose;
    }

    public function images(): StringList
    {
        return $this->images;
    }

    public function setUseCompose(bool $useCompose): self
    {
        $this->useCompose = $useCompose;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'images' => $this->images,
            'useCompose' => $this->useCompose,
        ];
    }
}
