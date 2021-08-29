<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * additional flags passed on the command line to kubectl either on every command
 * (Global), on creations (Apply) or deletions (Delete).
 */
class KubectlFlags implements JsonSerializable
{
    /**
     * additional flags passed on creations (`kubectl apply`).
     */
    private StringList $apply;

    /**
     * additional flags passed on deletions (`kubectl delete`).
     */
    private StringList $delete;

    /**
     * passes the `--validate=false` flag to supported `kubectl` commands when enabled.
     */
    private bool|null $disableValidation = null;

    /**
     * additional flags passed on every command.
     */
    private StringList $global;

    public function __construct()
    {
        $this->apply = new StringList();
        $this->delete = new StringList();
        $this->global = new StringList();
    }

    public function apply(): StringList
    {
        return $this->apply;
    }

    public function delete(): StringList
    {
        return $this->delete;
    }

    public function getDisableValidation(): bool|null
    {
        return $this->disableValidation;
    }

    public function global(): StringList
    {
        return $this->global;
    }

    public function setDisableValidation(bool $disableValidation): self
    {
        $this->disableValidation = $disableValidation;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'apply' => $this->apply,
            'delete' => $this->delete,
            'disableValidation' => $this->disableValidation,
            'global' => $this->global,
        ];
    }
}
