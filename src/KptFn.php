<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * adds additional configurations used when calling `kpt fn`.
 */
class KptFn implements JsonSerializable
{
    /**
     * directory to discover the declarative kpt functions. If not provided, kpt
     * deployer uses `kpt.Dir`.
     */
    private string|null $fnPath = null;

    /**
     * sets the global scope for the kpt functions. see `kpt help fn run`.
     */
    private bool|null $globalScope = null;

    /**
     * a kpt function image to run the configs imperatively. If provided, kpt.fn.fnPath
     * will be ignored.
     */
    private string|null $image = null;

    /**
     * a list of storage options to mount to the fn image.
     */
    private StringList $mount;

    /**
     * enables network access for the kpt function containers.
     */
    private bool|null $network = null;

    /**
     * docker network name to run the kpt function containers (default "bridge").
     */
    private string|null $networkName = null;

    /**
     * directory to where the manipulated resource output is stored.
     */
    private string|null $sinkDir = null;

    public function __construct()
    {
        $this->mount = new StringList();
    }

    public function getFnPath(): string|null
    {
        return $this->fnPath;
    }

    public function getGlobalScope(): bool|null
    {
        return $this->globalScope;
    }

    public function getImage(): string|null
    {
        return $this->image;
    }

    public function getNetwork(): bool|null
    {
        return $this->network;
    }

    public function getNetworkName(): string|null
    {
        return $this->networkName;
    }

    public function getSinkDir(): string|null
    {
        return $this->sinkDir;
    }

    public function mount(): StringList
    {
        return $this->mount;
    }

    public function setFnPath(string $fnPath): self
    {
        $this->fnPath = $fnPath;

        return $this;
    }

    public function setGlobalScope(bool $globalScope): self
    {
        $this->globalScope = $globalScope;

        return $this;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setNetwork(bool $network): self
    {
        $this->network = $network;

        return $this;
    }

    public function setNetworkName(string $networkName): self
    {
        $this->networkName = $networkName;

        return $this;
    }

    public function setSinkDir(string $sinkDir): self
    {
        $this->sinkDir = $sinkDir;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'fnPath' => $this->fnPath,
            'globalScope' => $this->globalScope,
            'image' => $this->image,
            'mount' => $this->mount,
            'network' => $this->network,
            'networkName' => $this->networkName,
            'sinkDir' => $this->sinkDir,
        ];
    }
}
