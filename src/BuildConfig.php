<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains all the configuration for the build steps.
 */
class BuildConfig implements JsonSerializable
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
