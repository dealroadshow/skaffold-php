<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes a single lifecycle hook to execute before or after each deployer step.
 */
class DeployHookItem implements JsonSerializable
{
    /**
     * describes a single lifecycle hook to run on a container.
     */
    private NamedContainerHook|null $container = null;

    /**
     * describes a single lifecycle hook to run on the host machine.
     */
    private HostHook $host;

    public function __construct()
    {
        $this->host = new HostHook();
    }

    public function getContainer(): NamedContainerHook|null
    {
        return $this->container;
    }

    public function host(): HostHook
    {
        return $this->host;
    }

    public function setContainer(NamedContainerHook $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'container' => $this->container,
            'host' => $this->host,
        ];
    }
}
