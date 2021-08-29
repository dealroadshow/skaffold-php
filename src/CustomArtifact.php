<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* describes an artifact built from a custom build script written by the
 * user. It can be used to build images with builders that aren't directly
 * integrated with skaffold.
 */
class CustomArtifact implements JsonSerializable
{
    /**
     * command executed to build the image.
     */
    private string|null $buildCommand = null;

    /**
     * file dependencies that skaffold should watch for both rebuilding and file
     * syncing for this artifact.
     */
    private CustomDependencies $dependencies;

    public function __construct()
    {
        $this->dependencies = new CustomDependencies();
    }

    public function dependencies(): CustomDependencies
    {
        return $this->dependencies;
    }

    public function getBuildCommand(): string|null
    {
        return $this->buildCommand;
    }

    public function setBuildCommand(string $buildCommand): self
    {
        $this->buildCommand = $buildCommand;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'buildCommand' => $this->buildCommand,
            'dependencies' => $this->dependencies,
        ];
    }
}
