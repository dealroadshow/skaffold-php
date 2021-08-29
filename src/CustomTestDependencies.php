<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * used to specify dependencies for custom test command. `paths` should be
 * specified for file watching to work as expected.
 */
class CustomTestDependencies implements JsonSerializable
{
    /**
     * represents a command that skaffold executes to obtain dependencies. The output
     * of this command *must* be a valid JSON array.
     */
    private string|null $command = null;

    /**
     * specifies the paths that should be ignored by skaffold's file watcher. If a file
     * exists in both `paths` and in `ignore`, it will be ignored, and will be excluded
     * from both retest and file synchronization. Will only work in conjunction with
     * `paths`.
     */
    private StringList $ignore;

    /**
     * locates the file dependencies for the command relative to workspace. Paths
     * should be set to the file dependencies for this command, so that the skaffold
     * file watcher knows when to retest and perform file synchronization.
     */
    private StringList $paths;

    public function __construct()
    {
        $this->ignore = new StringList();
        $this->paths = new StringList();
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
            'ignore' => $this->ignore,
            'paths' => $this->paths,
        ];
    }
}
