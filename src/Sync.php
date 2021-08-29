<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use Dealroadshow\Skaffold\Data\Collection\SyncRuleList;
use JsonSerializable;

/**
 * *beta* specifies what files to sync into the container. This is a list of sync
 * rules indicating the intent to sync for source files. If no files are listed,
 * sync all the files and infer the destination.
 */
class Sync implements JsonSerializable
{
    /**
     * delegates discovery of sync rules to the build system. Only available for jib
     * and buildpacks.
     */
    private bool|null $auto = null;

    /**
     * describes a set of lifecycle hooks that are executed before and after each file
     * sync action on the target artifact's containers.
     */
    private SyncHooks $hooks;

    /**
     * file patterns which may be synced into the container The container destination
     * is inferred by the builder based on the instructions of a Dockerfile. Available
     * for docker and kaniko artifacts and custom artifacts that declare dependencies
     * on a dockerfile.
     */
    private StringList $infer;

    /**
     * manual sync rules indicating the source and destination.
     */
    private SyncRuleList $manual;

    public function __construct()
    {
        $this->hooks = new SyncHooks();
        $this->infer = new StringList();
        $this->manual = new SyncRuleList();
    }

    public function getAuto(): bool|null
    {
        return $this->auto;
    }

    public function hooks(): SyncHooks
    {
        return $this->hooks;
    }

    public function infer(): StringList
    {
        return $this->infer;
    }

    public function manual(): SyncRuleList
    {
        return $this->manual;
    }

    public function setAuto(bool $auto): self
    {
        $this->auto = $auto;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'auto' => $this->auto,
            'hooks' => $this->hooks,
            'infer' => $this->infer,
            'manual' => $this->manual,
        ];
    }
}
