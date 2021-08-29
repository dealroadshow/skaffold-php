<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes a single lifecycle hook to execute before or after each artifact sync
 * step.
 */
class SyncHookItem implements JsonSerializable
{
    /**
     * describes a single lifecycle hook to run on a container.
     */
    private ContainerHook $container;

    /**
     * describes a single lifecycle hook to run on the host machine.
     */
    private HostHook $host;

    public function __construct()
    {
        $this->container = new ContainerHook();
        $this->host = new HostHook();
    }

    public function container(): ContainerHook
    {
        return $this->container;
    }

    public function host(): HostHook
    {
        return $this->host;
    }

    public function jsonSerialize(): array
    {
        return [
            'container' => $this->container,
            'host' => $this->host,
        ];
    }
}
