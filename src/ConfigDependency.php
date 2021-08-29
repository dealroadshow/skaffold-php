<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\ProfileDependencyList;
use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * describes a dependency on another skaffold configuration.
 */
class ConfigDependency implements JsonSerializable
{
    /**
     * describes the list of profiles to activate when resolving the required configs.
     * These profiles must exist in the imported config.
     */
    private ProfileDependencyList $activeProfiles;

    /**
     * includes specific named configs within the file path. If empty, then all configs
     * in the file are included.
     */
    private StringList $configs;

    /**
     * describes a remote git repository containing the required configs.
     */
    private GitInfo|null $git = null;

    /**
     * describes the path to the file containing the required configs.
     */
    private string|null $path = null;

    public function __construct()
    {
        $this->activeProfiles = new ProfileDependencyList();
        $this->configs = new StringList();
    }

    public function activeProfiles(): ProfileDependencyList
    {
        return $this->activeProfiles;
    }

    public function configs(): StringList
    {
        return $this->configs;
    }

    public function getGit(): GitInfo|null
    {
        return $this->git;
    }

    public function getPath(): string|null
    {
        return $this->path;
    }

    public function setGit(GitInfo $git): self
    {
        $this->git = $git;

        return $this;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'activeProfiles' => $this->activeProfiles,
            'configs' => $this->configs,
            'git' => $this->git,
            'path' => $this->path,
        ];
    }
}
