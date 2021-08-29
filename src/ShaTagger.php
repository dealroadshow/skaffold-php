<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* tags images with their sha256 digest.
 */
class ShaTagger implements JsonSerializable
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
