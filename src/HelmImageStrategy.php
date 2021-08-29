<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * adds image configurations to the Helm `values` file.
 */
class HelmImageStrategy implements JsonSerializable
{
    public function __construct()
    {
    }

    public function jsonSerialize(): array
    {
        return [
        ];
    }
}
