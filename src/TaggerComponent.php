<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* a component of CustomTemplateTagger.
 */
class TaggerComponent implements JsonSerializable
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
