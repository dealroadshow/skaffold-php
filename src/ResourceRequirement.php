<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * stores the CPU/Memory requirements for the pod.
 */
class ResourceRequirement implements JsonSerializable
{
    /**
     * the number cores to be used.
     */
    private string|null $cpu = null;

    /**
     * the amount of Ephemeral storage to allocate to the pod.
     */
    private string|null $ephemeralStorage = null;

    /**
     * the amount of memory to allocate to the pod.
     */
    private string|null $memory = null;

    /**
     * the amount of resource storage to allocate to the pod.
     */
    private string|null $resourceStorage = null;

    public function __construct()
    {
    }

    public function getCpu(): string|null
    {
        return $this->cpu;
    }

    public function getEphemeralStorage(): string|null
    {
        return $this->ephemeralStorage;
    }

    public function getMemory(): string|null
    {
        return $this->memory;
    }

    public function getResourceStorage(): string|null
    {
        return $this->resourceStorage;
    }

    public function setCpu(string $cpu): self
    {
        $this->cpu = $cpu;

        return $this;
    }

    public function setEphemeralStorage(string $ephemeralStorage): self
    {
        $this->ephemeralStorage = $ephemeralStorage;

        return $this;
    }

    public function setMemory(string $memory): self
    {
        $this->memory = $memory;

        return $this;
    }

    public function setResourceStorage(string $resourceStorage): self
    {
        $this->resourceStorage = $resourceStorage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'cpu' => $this->cpu,
            'ephemeralStorage' => $this->ephemeralStorage,
            'memory' => $this->memory,
            'resourceStorage' => $this->resourceStorage,
        ];
    }
}
