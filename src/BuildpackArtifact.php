<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * *alpha* describes an artifact built using [Cloud Native
 * Buildpacks](https://buildpacks.io/). It can be used to build images out of
 * project's sources without any additional configuration.
 */
class BuildpackArtifact implements JsonSerializable
{
    /**
     * builder image used.
     */
    private string $builder;

    /**
     * a list of strings, where each string is a specific buildpack to use with the
     * builder. If you specify buildpacks the builder image automatic detection will be
     * ignored. These buildpacks will be used to build the Image from your source code.
     * Order matters.
     */
    private StringList $buildpacks;

    /**
     * file dependencies that skaffold should watch for both rebuilding and file
     * syncing for this artifact.
     */
    private BuildpackDependencies $dependencies;

    /**
     * environment variables, in the `key=value` form,  passed to the build. Values can
     * use the go template syntax.
     */
    private StringList $env;

    /**
     * path to the project descriptor file.
     */
    private string|null $projectDescriptor = null;

    /**
     * overrides the stack's default run image.
     */
    private string|null $runImage = null;

    /**
     * indicates that the builder should be trusted.
     */
    private bool|null $trustBuilder = null;

    /**
     * support mounting host volumes into the container.
     */
    private mixed $volumes;

    public function __construct(string $builder)
    {
        $this->builder = $builder;
        $this->buildpacks = new StringList();
        $this->dependencies = new BuildpackDependencies();
        $this->env = new StringList();
    }

    public function buildpacks(): StringList
    {
        return $this->buildpacks;
    }

    public function dependencies(): BuildpackDependencies
    {
        return $this->dependencies;
    }

    public function env(): StringList
    {
        return $this->env;
    }

    public function getBuilder(): string
    {
        return $this->builder;
    }

    public function getProjectDescriptor(): string|null
    {
        return $this->projectDescriptor;
    }

    public function getRunImage(): string|null
    {
        return $this->runImage;
    }

    public function getTrustBuilder(): bool|null
    {
        return $this->trustBuilder;
    }

    public function getVolumes(): mixed
    {
        return $this->volumes;
    }

    public function setBuilder(string $builder): self
    {
        $this->builder = $builder;

        return $this;
    }

    public function setProjectDescriptor(string $projectDescriptor): self
    {
        $this->projectDescriptor = $projectDescriptor;

        return $this;
    }

    public function setRunImage(string $runImage): self
    {
        $this->runImage = $runImage;

        return $this;
    }

    public function setTrustBuilder(bool $trustBuilder): self
    {
        $this->trustBuilder = $trustBuilder;

        return $this;
    }

    public function setVolumes(mixed $volumes): self
    {
        $this->volumes = $volumes;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'builder' => $this->builder,
            'buildpacks' => $this->buildpacks,
            'dependencies' => $this->dependencies,
            'env' => $this->env,
            'projectDescriptor' => $this->projectDescriptor,
            'runImage' => $this->runImage,
            'trustBuilder' => $this->trustBuilder,
            'volumes' => $this->volumes,
        ];
    }
}
