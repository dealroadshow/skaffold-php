<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * *beta* used to specify dependencies for an artifact built by a custom build
 * script. Either `dockerfile` or `paths` should be specified for file watching to
 * work as expected.
 */
class CustomDependencies implements JsonSerializable
{
    /**
     * represents a custom command that skaffold executes to obtain dependencies. The
     * output of this command *must* be a valid JSON array.
     */
    private string|null $command = null;

    /**
     * should be set if the artifact is built from a Dockerfile, from which skaffold
     * can determine dependencies.
     */
    private DockerfileDependency $dockerfile;

    /**
     * specifies the paths that should be ignored by skaffold's file watcher. If a file
     * exists in both `paths` and in `ignore`, it will be ignored, and will be excluded
     * from both rebuilds and file synchronization. Will only work in conjunction with
     * `paths`.
     */
    private StringList $ignore;

    /**
     * should be set to the file dependencies for this artifact, so that the skaffold
     * file watcher knows when to rebuild and perform file synchronization.
     */
    private StringList $paths;

    public function __construct()
    {
        $this->dockerfile = new DockerfileDependency();
        $this->ignore = new StringList();
        $this->paths = new StringList();
    }

    public function dockerfile(): DockerfileDependency
    {
        return $this->dockerfile;
    }

    public function getCommand(): string|null
    {
        return $this->command;
    }

    public function ignore(): StringList
    {
        return $this->ignore;
    }

    public function paths(): StringList
    {
        return $this->paths;
    }

    public function setCommand(string $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
            'dockerfile' => $this->dockerfile,
            'ignore' => $this->ignore,
            'paths' => $this->paths,
        ];
    }
}
