<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes a mapping from referenced config profiles to the current config
 * profiles. If the current config is activated with a profile in this mapping then
 * the dependency configs are also activated with the corresponding mapped
 * profiles.
 */
class ProfileDependency implements JsonSerializable
{
    /**
     * describes a list of profiles in the current config that when activated will also
     * activate the named profile in the dependency config. If empty then the named
     * profile is always activated.
     */
    private StringList $activatedBy;

    /**
     * describes name of the profile to activate in the dependency config. It should
     * exist in the dependency config.
     */
    private string $name;

    public function __construct(string $name)
    {
        $this->activatedBy = new StringList();
        $this->name = $name;
    }

    public function activatedBy(): StringList
    {
        return $this->activatedBy;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'activatedBy' => $this->activatedBy,
            'name' => $this->name,
        ];
    }
}
