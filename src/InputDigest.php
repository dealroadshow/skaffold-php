<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* tags hashes the image content.
 */
class InputDigest implements JsonSerializable
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
