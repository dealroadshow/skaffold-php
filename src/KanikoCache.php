<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * configures Kaniko caching. If a cache is specified, Kaniko will use a remote
 * cache which will speed up builds.
 */
class KanikoCache implements JsonSerializable
{
    /**
     * specifies a path on the host that is mounted to each pod as read only cache
     * volume containing base images. If set, must exist on each node and prepopulated
     * with kaniko-warmer.
     */
    private string|null $hostPath = null;

    /**
     * a remote repository to store cached layers. If none is specified, one will be
     * inferred from the image name. See [Kaniko
     * Caching](https://github.com/GoogleContainerTools/kaniko#caching).
     */
    private string|null $repo = null;

    /**
     * Cache timeout in hours.
     */
    private string|null $ttl = null;

    public function __construct()
    {
    }

    public function getHostPath(): string|null
    {
        return $this->hostPath;
    }

    public function getRepo(): string|null
    {
        return $this->repo;
    }

    public function getTtl(): string|null
    {
        return $this->ttl;
    }

    public function setHostPath(string $hostPath): self
    {
        $this->hostPath = $hostPath;

        return $this;
    }

    public function setRepo(string $repo): self
    {
        $this->repo = $repo;

        return $this;
    }

    public function setTtl(string $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'hostPath' => $this->hostPath,
            'repo' => $this->repo,
            'ttl' => $this->ttl,
        ];
    }
}
