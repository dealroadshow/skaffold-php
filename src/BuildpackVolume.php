<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *alpha* used to mount host volumes or directories in the build container.
 */
class BuildpackVolume implements JsonSerializable
{
    /**
     * local volume or absolute directory of the path to mount.
     */
    private string $host;

    /**
     * specify a list of comma-separated mount options. Valid options are: `ro`
     * (default): volume contents are read-only. `rw`: volume contents are readable and
     * writable. `volume-opt=<key>=<value>`: can be specified more than once, takes a
     * key-value pair.
     */
    private string|null $options = null;

    /**
     * path where the file or directory is available in the container. It is strongly
     * recommended to not specify locations under `/cnb` or `/layers`.
     */
    private string $target;

    public function __construct(string $host, string $target)
    {
        $this->host = $host;
        $this->target = $target;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getOptions(): string|null
    {
        return $this->options;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

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
            'host' => $this->host,
            'options' => $this->options,
            'target' => $this->target,
        ];
    }
}
