<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * adds additional configurations used when calling `kpt live`.
 */
class KptLive implements JsonSerializable
{
    /**
     * sets the kpt inventory directory.
     */
    private KptApplyInventory $apply;

    /**
     * adds additional configurations for `kpt live apply` commands.
     */
    private KptApplyOptions $options;

    public function __construct()
    {
        $this->apply = new KptApplyInventory();
        $this->options = new KptApplyOptions();
    }

    public function apply(): KptApplyInventory
    {
        return $this->apply;
    }

    public function options(): KptApplyOptions
    {
        return $this->options;
    }

    public function jsonSerialize(): array
    {
        return [
            'apply' => $this->apply,
            'options' => $this->options,
        ];
    }
}
