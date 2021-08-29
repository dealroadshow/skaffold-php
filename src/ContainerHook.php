<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes a lifecycle hook definition to execute on a container. The container
 * name is inferred from the scope in which this hook is defined.
 */
class ContainerHook implements JsonSerializable
{
    /**
     * command to execute.
     */
    private StringList $command;

    public function __construct()
    {
        $this->command = new StringList();
    }

    public function command(): StringList
    {
        return $this->command;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
        ];
    }
}
