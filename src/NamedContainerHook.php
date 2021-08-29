<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes a lifecycle hook definition to execute on a named container.
 */
class NamedContainerHook implements JsonSerializable
{
    /**
     * command to execute.
     */
    private StringList $command;

    /**
     * name of the container to execute the command in.
     */
    private string|null $containerName = null;

    /**
     * name of the pod to execute the command in.
     */
    private string $podName;

    public function __construct(string $podName)
    {
        $this->command = new StringList();
        $this->podName = $podName;
    }

    public function command(): StringList
    {
        return $this->command;
    }

    public function getContainerName(): string|null
    {
        return $this->containerName;
    }

    public function getPodName(): string
    {
        return $this->podName;
    }

    public function setContainerName(string $containerName): self
    {
        $this->containerName = $containerName;

        return $this;
    }

    public function setPodName(string $podName): self
    {
        $this->podName = $podName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
            'containerName' => $this->containerName,
            'podName' => $this->podName,
        ];
    }
}
