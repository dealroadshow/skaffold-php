<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * sets the kpt inventory directory.
 */
class KptApplyInventory implements JsonSerializable
{
    /**
     * equivalent to the dir in `kpt live apply <dir>`. If not provided, kpt deployer
     * will create a hidden directory `.kpt-hydrated` to store the manipulated resource
     * output and the kpt inventory-template.yaml file.
     */
    private string|null $dir = null;

    /**
     * *alpha* identifier for a group of applied resources. This value is only needed
     * when the `kpt live` is working on a pre-applied cluster resources.
     */
    private string|null $inventoryID = null;

    /**
     * *alpha* sets the inventory namespace.
     */
    private string|null $inventoryNamespace = null;

    public function __construct()
    {
    }

    public function getDir(): string|null
    {
        return $this->dir;
    }

    public function getInventoryID(): string|null
    {
        return $this->inventoryID;
    }

    public function getInventoryNamespace(): string|null
    {
        return $this->inventoryNamespace;
    }

    public function setDir(string $dir): self
    {
        $this->dir = $dir;

        return $this;
    }

    public function setInventoryID(string $inventoryID): self
    {
        $this->inventoryID = $inventoryID;

        return $this;
    }

    public function setInventoryNamespace(string $inventoryNamespace): self
    {
        $this->inventoryNamespace = $inventoryNamespace;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'dir' => $this->dir,
            'inventoryID' => $this->inventoryID,
            'inventoryNamespace' => $this->inventoryNamespace,
        ];
    }
}
