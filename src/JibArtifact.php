<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * builds images using the [Jib plugins for Maven and
 * Gradle](https://github.com/GoogleContainerTools/jib/).
 */
class JibArtifact implements JsonSerializable
{
    /**
     * additional build flags passed to the builder.
     */
    private StringList $args;

    /**
     * overrides the configured jib base image.
     */
    private string|null $fromImage = null;

    /**
     * selects which sub-project to build for multi-module builds.
     */
    private string|null $project = null;

    /**
     * the Jib builder type; normally determined automatically. Valid types are
     * `maven`: for Maven. `gradle`: for Gradle.
     */
    private string|null $type = null;

    public function __construct()
    {
        $this->args = new StringList();
    }

    public function args(): StringList
    {
        return $this->args;
    }

    public function getFromImage(): string|null
    {
        return $this->fromImage;
    }

    public function getProject(): string|null
    {
        return $this->project;
    }

    public function getType(): string|null
    {
        return $this->type;
    }

    public function setFromImage(string $fromImage): self
    {
        $this->fromImage = $fromImage;

        return $this;
    }

    public function setProject(string $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'args' => $this->args,
            'fromImage' => $this->fromImage,
            'project' => $this->project,
            'type' => $this->type,
        ];
    }
}
