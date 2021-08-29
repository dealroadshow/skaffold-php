<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\HostHookList;
use JsonSerializable;

/**
 * describes the list of lifecycle hooks to execute before and after each artifact
 * build step.
 */
class BuildHooks implements JsonSerializable
{
    /**
     * describes the list of lifecycle hooks to execute *after* each artifact build
     * step.
     */
    private HostHookList $after;

    /**
     * describes the list of lifecycle hooks to execute *before* each artifact build
     * step.
     */
    private HostHookList $before;

    public function __construct()
    {
        $this->after = new HostHookList();
        $this->before = new HostHookList();
    }

    public function after(): HostHookList
    {
        return $this->after;
    }

    public function before(): HostHookList
    {
        return $this->before;
    }

    public function jsonSerialize(): array
    {
        return [
            'after' => $this->after,
            'before' => $this->before,
        ];
    }
}
