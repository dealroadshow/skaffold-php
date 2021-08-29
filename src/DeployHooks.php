<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\DeployHookItemList;
use JsonSerializable;

/**
 * describes the list of lifecycle hooks to execute before and after each deployer
 * step.
 */
class DeployHooks implements JsonSerializable
{
    /**
     * describes the list of lifecycle hooks to execute *after* each deployer step.
     */
    private DeployHookItemList $after;

    /**
     * describes the list of lifecycle hooks to execute *before* each deployer step.
     * Container hooks will only run if the container exists from a previous deployment
     * step (for instance the successive iterations of a dev-loop during `skaffold
     * dev`).
     */
    private DeployHookItemList $before;

    public function __construct()
    {
        $this->after = new DeployHookItemList();
        $this->before = new DeployHookItemList();
    }

    public function after(): DeployHookItemList
    {
        return $this->after;
    }

    public function before(): DeployHookItemList
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
