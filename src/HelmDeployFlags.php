<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * additional option flags that are passed on the command line to `helm`.
 */
class HelmDeployFlags implements JsonSerializable
{
    /**
     * additional flags passed on every command.
     */
    private StringList $global;

    /**
     * additional flags passed to (`helm install`).
     */
    private StringList $install;

    /**
     * additional flags passed to (`helm upgrade`).
     */
    private StringList $upgrade;

    public function __construct()
    {
        $this->global = new StringList();
        $this->install = new StringList();
        $this->upgrade = new StringList();
    }

    public function global(): StringList
    {
        return $this->global;
    }

    public function install(): StringList
    {
        return $this->install;
    }

    public function upgrade(): StringList
    {
        return $this->upgrade;
    }

    public function jsonSerialize(): array
    {
        return [
            'global' => $this->global,
            'install' => $this->install,
            'upgrade' => $this->upgrade,
        ];
    }
}
