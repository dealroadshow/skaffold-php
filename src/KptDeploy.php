<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *alpha* uses the `kpt` CLI to manage and deploy manifests.
 */
class KptDeploy implements JsonSerializable
{
    /**
     * path to the config directory (Required). By default, the Dir contains the
     * application configurations, [kustomize config
     * files](https://kubectl.docs.kubernetes.io/pages/examples/kustomize.html) and
     * [declarative kpt
     * functions](https://googlecontainertools.github.io/kpt/guides/consumer/function/#declarative-run).
     */
    private string $dir;

    /**
     * adds additional configurations for `kpt fn`.
     */
    private KptFn $fn;

    /**
     * adds additional configurations for `kpt live`.
     */
    private KptLive $live;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
        $this->fn = new KptFn();
        $this->live = new KptLive();
    }

    public function fn(): KptFn
    {
        return $this->fn;
    }

    public function getDir(): string
    {
        return $this->dir;
    }

    public function live(): KptLive
    {
        return $this->live;
    }

    public function setDir(string $dir): self
    {
        $this->dir = $dir;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'dir' => $this->dir,
            'fn' => $this->fn,
            'live' => $this->live,
        ];
    }
}
