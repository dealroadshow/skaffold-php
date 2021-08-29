<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes a lifecycle hook definition to execute on the host machine.
 */
class HostHook implements JsonSerializable
{
    /**
     * command to execute.
     */
    private StringList $command;

    /**
     * an optional slice of operating system names. If the host machine OS is
     * different, then it skips execution.
     */
    private StringList $os;

    public function __construct()
    {
        $this->command = new StringList();
        $this->os = new StringList();
    }

    public function command(): StringList
    {
        return $this->command;
    }

    public function os(): StringList
    {
        return $this->os;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
            'os' => $this->os,
        ];
    }
}
