<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\TaggerComponentList;
use JsonSerializable;

/**
 * *beta* tags images with a configurable template string.
 */
class CustomTemplateTagger implements JsonSerializable
{
    /**
     * TaggerComponents that the template (see field above) can be executed against.
     */
    private TaggerComponentList $components;

    /**
     * used to produce the image name and tag. See golang
     * [text/template](https://golang.org/pkg/text/template/). The template is executed
     * against the provided components with those variables injected.
     */
    private string $template;

    public function __construct(string $template)
    {
        $this->components = new TaggerComponentList();
        $this->template = $template;
    }

    public function components(): TaggerComponentList
    {
        return $this->components;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'components' => $this->components,
            'template' => $this->template,
        ];
    }
}
