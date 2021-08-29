<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * items that need to be built, along with the context in which they should be
 * built.
 */
class Artifact implements JsonSerializable
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
