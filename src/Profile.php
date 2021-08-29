<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\ActivationList;
use Dealroadshow\Skaffold\Data\Collection\JSONPatchList;
use Dealroadshow\Skaffold\Data\Collection\PortForwardResourceList;
use Dealroadshow\Skaffold\Data\Collection\TestCaseList;
use JsonSerializable;

/**
 * used to override any `build`, `test` or `deploy` configuration.
 */
class Profile implements JsonSerializable
{
    /**
     * criteria by which a profile can be auto-activated. The profile is auto-activated
     * if any one of the activations are triggered. An activation is triggered if all
     * of the criteria (env, kubeContext, command) are triggered.
     */
    private ActivationList $activation;

    /**
     * describes how images are built.
     */
    private BuildConfig $build;

    /**
     * describes how images are deployed.
     */
    private DeployConfig $deploy;

    /**
     * a unique profile name.
     */
    private string $name;

    /**
     * patches applied to the configuration. Patches use the JSON patch notation.
     */
    private JSONPatchList $patches;

    /**
     * describes user defined resources to port-forward.
     */
    private PortForwardResourceList $portForward;

    /**
     * describes how images are tested.
     */
    private TestCaseList $test;

    public function __construct(string $name)
    {
        $this->activation = new ActivationList();
        $this->build = new BuildConfig();
        $this->deploy = new DeployConfig();
        $this->name = $name;
        $this->patches = new JSONPatchList();
        $this->portForward = new PortForwardResourceList();
        $this->test = new TestCaseList();
    }

    public function activation(): ActivationList
    {
        return $this->activation;
    }

    public function build(): BuildConfig
    {
        return $this->build;
    }

    public function deploy(): DeployConfig
    {
        return $this->deploy;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function patches(): JSONPatchList
    {
        return $this->patches;
    }

    public function portForward(): PortForwardResourceList
    {
        return $this->portForward;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function test(): TestCaseList
    {
        return $this->test;
    }

    public function jsonSerialize(): array
    {
        return [
            'activation' => $this->activation,
            'build' => $this->build,
            'deploy' => $this->deploy,
            'name' => $this->name,
            'patches' => $this->patches,
            'portForward' => $this->portForward,
            'test' => $this->test,
        ];
    }
}
