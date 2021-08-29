<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* describes how to do a build on the local docker daemon and optionally
 * push to a repository.
 */
class LocalBuild implements JsonSerializable
{
    /**
     * how many artifacts can be built concurrently. 0 means "no-limit".
     */
    private int|null $concurrency = null;

    /**
     * should images be pushed to a registry. If not specified, images are pushed only
     * if the current Kubernetes context connects to a remote cluster.
     */
    private bool|null $push = null;

    /**
     * whether to attempt to import artifacts from Docker (either a local or remote
     * registry) if not in the cache.
     */
    private bool|null $tryImportMissing = null;

    /**
     * use BuildKit to build Docker images.
     */
    private bool|null $useBuildkit = null;

    /**
     * use `docker` command-line interface instead of Docker Engine APIs.
     */
    private bool|null $useDockerCLI = null;

    public function __construct()
    {
    }

    public function getConcurrency(): int|null
    {
        return $this->concurrency;
    }

    public function getPush(): bool|null
    {
        return $this->push;
    }

    public function getTryImportMissing(): bool|null
    {
        return $this->tryImportMissing;
    }

    public function getUseBuildkit(): bool|null
    {
        return $this->useBuildkit;
    }

    public function getUseDockerCLI(): bool|null
    {
        return $this->useDockerCLI;
    }

    public function setConcurrency(int $concurrency): self
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    public function setPush(bool $push): self
    {
        $this->push = $push;

        return $this;
    }

    public function setTryImportMissing(bool $tryImportMissing): self
    {
        $this->tryImportMissing = $tryImportMissing;

        return $this;
    }

    public function setUseBuildkit(bool $useBuildkit): self
    {
        $this->useBuildkit = $useBuildkit;

        return $this;
    }

    public function setUseDockerCLI(bool $useDockerCLI): self
    {
        $this->useDockerCLI = $useDockerCLI;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'concurrency' => $this->concurrency,
            'push' => $this->push,
            'tryImportMissing' => $this->tryImportMissing,
            'useBuildkit' => $this->useBuildkit,
            'useDockerCLI' => $this->useDockerCLI,
        ];
    }
}
