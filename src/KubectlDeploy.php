<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * *beta* uses a client side `kubectl apply` to deploy manifests. You'll need a
 * `kubectl` CLI version installed that's compatible with your cluster.
 */
class KubectlDeploy implements JsonSerializable
{
    /**
     * default namespace passed to kubectl on deployment if no other override is given.
     */
    private string|null $defaultNamespace = null;

    /**
     * additional flags passed to `kubectl`.
     */
    private KubectlFlags $flags;

    /**
     * describes a set of lifecycle hooks that are executed before and after every
     * deploy.
     */
    private DeployHooks $hooks;

    /**
     * the Kubernetes yaml or json manifests.
     */
    private StringList $manifests;

    /**
     * Kubernetes manifests in remote clusters.
     */
    private StringList $remoteManifests;

    public function __construct()
    {
        $this->flags = new KubectlFlags();
        $this->hooks = new DeployHooks();
        $this->manifests = new StringList();
        $this->remoteManifests = new StringList();
    }

    public function flags(): KubectlFlags
    {
        return $this->flags;
    }

    public function getDefaultNamespace(): string|null
    {
        return $this->defaultNamespace;
    }

    public function hooks(): DeployHooks
    {
        return $this->hooks;
    }

    public function manifests(): StringList
    {
        return $this->manifests;
    }

    public function remoteManifests(): StringList
    {
        return $this->remoteManifests;
    }

    public function setDefaultNamespace(string $defaultNamespace): self
    {
        $this->defaultNamespace = $defaultNamespace;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'defaultNamespace' => $this->defaultNamespace,
            'flags' => $this->flags,
            'hooks' => $this->hooks,
            'manifests' => $this->manifests,
            'remoteManifests' => $this->remoteManifests,
        ];
    }
}
