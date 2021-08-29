<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\SyncHookItemList;
use JsonSerializable;

/**
 * describes the list of lifecycle hooks to execute before and after each artifact
 * sync step.
 */
class SyncHooks implements JsonSerializable
{
    /**
     * describes the list of lifecycle hooks to execute *after* each artifact sync
     * step.
     */
    private SyncHookItemList $after;

    /**
     * describes the list of lifecycle hooks to execute *before* each artifact sync
     * step.
     */
    private SyncHookItemList $before;

    public function __construct()
    {
        $this->after = new SyncHookItemList();
        $this->before = new SyncHookItemList();
    }

    public function after(): SyncHookItemList
    {
        return $this->after;
    }

    public function before(): SyncHookItemList
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
