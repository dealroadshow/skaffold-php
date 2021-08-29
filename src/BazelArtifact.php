<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes an artifact built with [Bazel](https://bazel.build/).
 */
class BazelArtifact implements JsonSerializable
{
    /**
     * additional args to pass to `bazel build`.
     */
    private StringList $args;

    /**
     * `bazel build` target to run.
     */
    private string $target;

    public function __construct(string $target)
    {
        $this->args = new StringList();
        $this->target = $target;
    }

    public function args(): StringList
    {
        return $this->args;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'args' => $this->args,
            'target' => $this->target,
        ];
    }
}
