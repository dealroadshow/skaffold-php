<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains information about the docker `config.json` to mount.
 */
class DockerConfig implements JsonSerializable
{
    /**
     * path to the docker `config.json`.
     */
    private string|null $path = null;

    /**
     * Kubernetes secret that contains the `config.json` Docker configuration. Note
     * that the expected secret type is not 'kubernetes.io/dockerconfigjson' but
     * 'Opaque'.
     */
    private string|null $secretName = null;

    public function __construct()
    {
    }

    public function getPath(): string|null
    {
        return $this->path;
    }

    public function getSecretName(): string|null
    {
        return $this->secretName;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function setSecretName(string $secretName): self
    {
        $this->secretName = $secretName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'path' => $this->path,
            'secretName' => $this->secretName,
        ];
    }
}
