<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * *alpha* used to specify dependencies for an artifact built by buildpacks.
 */
class BuildpackDependencies implements JsonSerializable
{
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
        $this->ignore = new StringList();
        $this->paths = new StringList();
    }

    public function ignore(): StringList
    {
        return $this->ignore;
    }

    public function paths(): StringList
    {
        return $this->paths;
    }

    public function jsonSerialize(): array
    {
        return [
            'ignore' => $this->ignore,
            'paths' => $this->paths,
        ];
    }
}
