<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * configures how container logs are printed as a result of a deployment.
 */
class LogsConfig implements JsonSerializable
{
    /**
     * defines the prefix shown on each log line. Valid values are `container`: prefix
     * logs lines with the name of the container. `podAndContainer`: prefix logs lines
     * with the names of the pod and of the container. `auto`: same as
     * `podAndContainer` except that the pod name is skipped if it's the same as the
     * container name. `none`: don't add a prefix.
     */
    private string|null $prefix = null;

    public function __construct()
    {
    }

    public function getPrefix(): string|null
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'prefix' => $this->prefix,
        ];
    }
}
