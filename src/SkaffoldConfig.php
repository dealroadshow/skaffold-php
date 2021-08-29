<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\ConfigDependencyList;
use Dealroadshow\Skaffold\Data\Collection\PortForwardResourceList;
use Dealroadshow\Skaffold\Data\Collection\ProfileList;
use Dealroadshow\Skaffold\Data\Collection\TestCaseList;
use JsonSerializable;

/**
 * holds the fields parsed from the Skaffold configuration file (skaffold.yaml).
 */
class SkaffoldConfig implements JsonSerializable
{
    /**
     * version of the configuration.
     */
    private string $apiVersion;

    /**
     * describes how images are built.
     */
    private BuildConfig $build;

    /**
     * describes how images are deployed.
     */
    private DeployConfig $deploy;

    /**
     * always `Config`.
     */
    private string $kind;

    /**
     * holds additional information about the config.
     */
    private Metadata $metadata;

    /**
     * describes user defined resources to port-forward.
     */
    private PortForwardResourceList $portForward;

    /**
     * *beta* can override be used to `build`, `test` or `deploy` configuration.
     */
    private ProfileList $profiles;

    /**
     * describes a list of other required configs for the current config.
     */
    private ConfigDependencyList $requires;

    /**
     * describes how images are tested.
     */
    private TestCaseList $test;

    public function __construct(string $apiVersion, string $kind)
    {
        $this->apiVersion = $apiVersion;
        $this->build = new BuildConfig();
        $this->deploy = new DeployConfig();
        $this->kind = $kind;
        $this->metadata = new Metadata();
        $this->portForward = new PortForwardResourceList();
        $this->profiles = new ProfileList();
        $this->requires = new ConfigDependencyList();
        $this->test = new TestCaseList();
    }

    public function build(): BuildConfig
    {
        return $this->build;
    }

    public function deploy(): DeployConfig
    {
        return $this->deploy;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function metadata(): Metadata
    {
        return $this->metadata;
    }

    public function portForward(): PortForwardResourceList
    {
        return $this->portForward;
    }

    public function profiles(): ProfileList
    {
        return $this->profiles;
    }

    public function requires(): ConfigDependencyList
    {
        return $this->requires;
    }

    public function setApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    public function setKind(string $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function test(): TestCaseList
    {
        return $this->test;
    }

    public function jsonSerialize(): array
    {
        return [
            'apiVersion' => $this->apiVersion,
            'build' => $this->build,
            'deploy' => $this->deploy,
            'kind' => $this->kind,
            'metadata' => $this->metadata,
            'portForward' => $this->portForward,
            'profiles' => $this->profiles,
            'requires' => $this->requires,
            'test' => $this->test,
        ];
    }
}
