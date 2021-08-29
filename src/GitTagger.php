<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* tags images with the git tag or commit of the artifact's workspace.
 */
class GitTagger implements JsonSerializable
{
    /**
     * specifies whether to omit the `-dirty` postfix if there are uncommitted changes.
     */
    private bool|null $ignoreChanges = null;

    /**
     * adds a fixed prefix to the tag.
     */
    private string|null $prefix = null;

    /**
     * determines the behavior of the git tagger. Valid variants are: `Tags` (default):
     * use git tags or fall back to abbreviated commit hash. `CommitSha`: use the full
     * git commit sha. `AbbrevCommitSha`: use the abbreviated git commit sha.
     * `TreeSha`: use the full tree hash of the artifact workingdir. `AbbrevTreeSha`:
     * use the abbreviated tree hash of the artifact workingdir.
     */
    private string|null $variant = null;

    public function __construct()
    {
    }

    public function getIgnoreChanges(): bool|null
    {
        return $this->ignoreChanges;
    }

    public function getPrefix(): string|null
    {
        return $this->prefix;
    }

    public function getVariant(): string|null
    {
        return $this->variant;
    }

    public function setIgnoreChanges(bool $ignoreChanges): self
    {
        $this->ignoreChanges = $ignoreChanges;

        return $this;
    }

    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function setVariant(string $variant): self
    {
        $this->variant = $variant;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'ignoreChanges' => $this->ignoreChanges,
            'prefix' => $this->prefix,
            'variant' => $this->variant,
        ];
    }
}
