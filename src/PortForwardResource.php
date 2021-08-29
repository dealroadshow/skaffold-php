<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes a resource to port forward.
 */
class PortForwardResource implements JsonSerializable
{
    /**
     * local address to bind to. Defaults to the loopback address 127.0.0.1.
     */
    private string|null $address = null;

    /**
     * local port to forward to. If the port is unavailable, Skaffold will choose a
     * random open port to forward to. *Optional*.
     */
    private int|null $localPort = null;

    /**
     * namespace of the resource to port forward. Does not apply to local containers.
     */
    private string|null $namespace = null;

    /**
     * resource port that will be forwarded.
     */
    private string|int|null $port = null;

    /**
     * name of the Kubernetes resource or local container to port forward.
     */
    private string|null $resourceName = null;

    /**
     * resource type that should be port forwarded. Acceptable resource types include
     * kubernetes types: `Service`, `Pod` and Controller resource type that has a pod
     * spec: `ReplicaSet`, `ReplicationController`, `Deployment`, `StatefulSet`,
     * `DaemonSet`, `Job`, `CronJob`. Standalone `Container` is also valid for Docker
     * deployments.
     */
    private string|null $resourceType = null;

    public function __construct()
    {
    }

    public function getAddress(): string|null
    {
        return $this->address;
    }

    public function getLocalPort(): int|null
    {
        return $this->localPort;
    }

    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    public function getPort(): string|int|null
    {
        return $this->port;
    }

    public function getResourceName(): string|null
    {
        return $this->resourceName;
    }

    public function getResourceType(): string|null
    {
        return $this->resourceType;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setLocalPort(int $localPort): self
    {
        $this->localPort = $localPort;

        return $this;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function setPort(string|int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function setResourceName(string $resourceName): self
    {
        $this->resourceName = $resourceName;

        return $this;
    }

    public function setResourceType(string $resourceType): self
    {
        $this->resourceType = $resourceType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'address' => $this->address,
            'localPort' => $this->localPort,
            'namespace' => $this->namespace,
            'port' => $this->port,
            'resourceName' => $this->resourceName,
            'resourceType' => $this->resourceType,
        ];
    }
}
