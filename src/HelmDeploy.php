<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\HelmReleaseList;
use JsonSerializable;

/**
 * *beta* uses the `helm` CLI to apply the charts to the cluster.
 */
class HelmDeploy implements JsonSerializable
{
    /**
     * additional option flags that are passed on the command line to `helm`.
     */
    private HelmDeployFlags $flags;

    /**
     * a list of Helm releases.
     */
    private HelmReleaseList $releases;

    public function __construct()
    {
        $this->flags = new HelmDeployFlags();
        $this->releases = new HelmReleaseList();
    }

    public function flags(): HelmDeployFlags
    {
        return $this->flags;
    }

    public function releases(): HelmReleaseList
    {
        return $this->releases;
    }

    public function jsonSerialize(): array
    {
        return [
            'flags' => $this->flags,
            'releases' => $this->releases,
        ];
    }
}
