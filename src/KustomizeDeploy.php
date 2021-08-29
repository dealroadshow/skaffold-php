<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * *beta* uses the `kustomize` CLI to "patch" a deployment for a target
 * environment.
 */
class KustomizeDeploy implements JsonSerializable
{
    /**
     * additional args passed to `kustomize build`.
     */
    private StringList $buildArgs;

    /**
     * default namespace passed to kubectl on deployment if no other override is given.
     */
    private string|null $defaultNamespace = null;

    /**
     * additional flags passed to `kubectl`.
     */
    private KubectlFlags $flags;

    /**
     * path to Kustomization files.
     */
    private StringList $paths;

    public function __construct()
    {
        $this->buildArgs = new StringList();
        $this->flags = new KubectlFlags();
        $this->paths = new StringList();
    }

    public function buildArgs(): StringList
    {
        return $this->buildArgs;
    }

    public function flags(): KubectlFlags
    {
        return $this->flags;
    }

    public function getDefaultNamespace(): string|null
    {
        return $this->defaultNamespace;
    }

    public function paths(): StringList
    {
        return $this->paths;
    }

    public function setDefaultNamespace(string $defaultNamespace): self
    {
        $this->defaultNamespace = $defaultNamespace;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'buildArgs' => $this->buildArgs,
            'defaultNamespace' => $this->defaultNamespace,
            'flags' => $this->flags,
            'paths' => $this->paths,
        ];
    }
}
