<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* tags images with a configurable template string.
 */
class EnvTemplateTagger implements JsonSerializable
{
    /**
     * used to produce the image name and tag. See golang
     * [text/template](https://golang.org/pkg/text/template/). The template is executed
     * against the current environment, with those variables injected.
     */
    private string $template;

    public function __construct(string $template)
    {
        $this->template = $template;
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
            'template' => $this->template,
        ];
    }
}
