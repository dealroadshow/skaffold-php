<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use Dealroadshow\Skaffold\Data\Collection\StringMap;
use JsonSerializable;

/**
 * describes an artifact built from a Dockerfile, usually using `docker build`.
 */
class DockerArtifact implements JsonSerializable
{
    /**
     * add host.
     */
    private StringList $addHost;

    /**
     * arguments passed to the docker build.
     */
    private StringMap $buildArgs;

    /**
     * the Docker images used as cache sources.
     */
    private StringList $cacheFrom;

    /**
     * any additional flags to pass to the local daemon during a build. These flags are
     * only used during a build through the Docker CLI.
     */
    private StringList $cliFlags;

    /**
     * locates the Dockerfile relative to workspace.
     */
    private string|null $dockerfile = null;

    /**
     * passed through to docker and overrides the network configuration of docker
     * builder. If unset, use whatever is configured in the underlying docker daemon.
     * Valid modes are `host`: use the host's networking stack. `bridge`: use the
     * bridged network configuration. `container:<name|id>`: reuse another container's
     * network stack. `none`: no networking in the container.
     */
    private string|null $network = null;

    /**
     * used to pass in --no-cache to docker build to prevent caching.
     */
    private bool|null $noCache = null;

    /**
     * contains information about a local secret passed to `docker build`, along with
     * optional destination information.
     */
    private DockerSecret|null $secret = null;

    /**
     * used to pass in --squash to docker build to squash docker image layers into
     * single layer.
     */
    private bool|null $squash = null;

    /**
     * used to pass in --ssh to docker build to use SSH agent. Format is
     * "default|<id>[=<socket>|<key>[,<key>]]".
     */
    private string|null $ssh = null;

    /**
     * Dockerfile target name to build.
     */
    private string|null $target = null;

    public function __construct()
    {
        $this->addHost = new StringList();
        $this->buildArgs = new StringMap();
        $this->cacheFrom = new StringList();
        $this->cliFlags = new StringList();
    }

    public function addHost(): StringList
    {
        return $this->addHost;
    }

    public function buildArgs(): StringMap
    {
        return $this->buildArgs;
    }

    public function cacheFrom(): StringList
    {
        return $this->cacheFrom;
    }

    public function cliFlags(): StringList
    {
        return $this->cliFlags;
    }

    public function getDockerfile(): string|null
    {
        return $this->dockerfile;
    }

    public function getNetwork(): string|null
    {
        return $this->network;
    }

    public function getNoCache(): bool|null
    {
        return $this->noCache;
    }

    public function getSecret(): DockerSecret|null
    {
        return $this->secret;
    }

    public function getSquash(): bool|null
    {
        return $this->squash;
    }

    public function getSsh(): string|null
    {
        return $this->ssh;
    }

    public function getTarget(): string|null
    {
        return $this->target;
    }

    public function setDockerfile(string $dockerfile): self
    {
        $this->dockerfile = $dockerfile;

        return $this;
    }

    public function setNetwork(string $network): self
    {
        $this->network = $network;

        return $this;
    }

    public function setNoCache(bool $noCache): self
    {
        $this->noCache = $noCache;

        return $this;
    }

    public function setSecret(DockerSecret $secret): self
    {
        $this->secret = $secret;

        return $this;
    }

    public function setSquash(bool $squash): self
    {
        $this->squash = $squash;

        return $this;
    }

    public function setSsh(string $ssh): self
    {
        $this->ssh = $ssh;

        return $this;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'addHost' => $this->addHost,
            'buildArgs' => $this->buildArgs,
            'cacheFrom' => $this->cacheFrom,
            'cliFlags' => $this->cliFlags,
            'dockerfile' => $this->dockerfile,
            'network' => $this->network,
            'noCache' => $this->noCache,
            'secret' => $this->secret,
            'squash' => $this->squash,
            'ssh' => $this->ssh,
            'target' => $this->target,
        ];
    }
}
