<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains information on the origin of skaffold configurations cloned from a git
 * repository.
 */
class GitInfo implements JsonSerializable
{
    /**
     * relative path from the repo root to the skaffold configuration file. eg.
     * `getting-started/skaffold.yaml`.
     */
    private string|null $path = null;

    /**
     * git ref the package should be cloned from. eg. `master` or `main`.
     */
    private string|null $ref = null;

    /**
     * git repository the package should be cloned from.  e.g.
     * `https://github.com/GoogleContainerTools/skaffold.git`.
     */
    private string $repo;

    /**
     * when set to `true` will reset the cached repository to the latest commit from
     * remote on every run. To use the cached repository with uncommitted changes or
     * unpushed commits, it needs to be set to `false`.
     */
    private bool|null $sync = null;

    public function __construct(string $repo)
    {
        $this->repo = $repo;
    }

    public function getPath(): string|null
    {
        return $this->path;
    }

    public function getRef(): string|null
    {
        return $this->ref;
    }

    public function getRepo(): string
    {
        return $this->repo;
    }

    public function getSync(): bool|null
    {
        return $this->sync;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function setRepo(string $repo): self
    {
        $this->repo = $repo;

        return $this;
    }

    public function setSync(bool $sync): self
    {
        $this->sync = $sync;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'path' => $this->path,
            'ref' => $this->ref,
            'repo' => $this->repo,
            'sync' => $this->sync,
        ];
    }
}
