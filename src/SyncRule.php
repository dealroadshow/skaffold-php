<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * specifies which local files to sync to remote folders.
 */
class SyncRule implements JsonSerializable
{
    /**
     * destination path in the container where the files should be synced to.
     */
    private string $dest;

    /**
     * a glob pattern to match local paths against. Directories should be delimited by
     * `/` on all platforms.
     */
    private string $src;

    /**
     * specifies the path prefix to remove from the source path when transplanting the
     * files into the destination folder.
     */
    private string|null $strip = null;

    public function __construct(string $dest, string $src)
    {
        $this->dest = $dest;
        $this->src = $src;
    }

    public function getDest(): string
    {
        return $this->dest;
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function getStrip(): string|null
    {
        return $this->strip;
    }

    public function setDest(string $dest): self
    {
        $this->dest = $dest;

        return $this;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function setStrip(string $strip): self
    {
        $this->strip = $strip;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'dest' => $this->dest,
            'src' => $this->src,
            'strip' => $this->strip,
        ];
    }
}
