<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringMap;
use JsonSerializable;

/**
 * *beta* used to specify a custom build artifact that is built from a Dockerfile.
 * This allows skaffold to determine dependencies from the Dockerfile.
 */
class DockerfileDependency implements JsonSerializable
{
    /**
     * key/value pairs used to resolve values of `ARG` instructions in a Dockerfile.
     * Values can be constants or environment variables via the go template syntax.
     */
    private StringMap $buildArgs;

    /**
     * locates the Dockerfile relative to workspace.
     */
    private string|null $path = null;

    public function __construct()
    {
        $this->buildArgs = new StringMap();
    }

    public function buildArgs(): StringMap
    {
        return $this->buildArgs;
    }

    public function getPath(): string|null
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'buildArgs' => $this->buildArgs,
            'path' => $this->path,
        ];
    }
}
