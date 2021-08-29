<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains all the configuration for the tagging step.
 */
class TagPolicy implements JsonSerializable
{
    /**
     * *beta* tags images with a configurable template string *composed of other
     * taggers*.
     */
    private CustomTemplateTagger|null $customTemplate = null;

    /**
     * *beta* tags images with the build timestamp.
     */
    private DateTimeTagger $dateTime;

    /**
     * *beta* tags images with a configurable template string.
     */
    private EnvTemplateTagger|null $envTemplate = null;

    /**
     * *beta* tags images with the git tag or commit of the artifact's workspace.
     */
    private GitTagger $gitCommit;

    /**
     * *beta* tags images with their sha256 digest of their content.
     */
    private InputDigest $inputDigest;

    /**
     * *beta* tags images with their sha256 digest.
     */
    private ShaTagger $sha256;

    public function __construct()
    {
        $this->dateTime = new DateTimeTagger();
        $this->gitCommit = new GitTagger();
        $this->inputDigest = new InputDigest();
        $this->sha256 = new ShaTagger();
    }

    public function dateTime(): DateTimeTagger
    {
        return $this->dateTime;
    }

    public function getCustomTemplate(): CustomTemplateTagger|null
    {
        return $this->customTemplate;
    }

    public function getEnvTemplate(): EnvTemplateTagger|null
    {
        return $this->envTemplate;
    }

    public function gitCommit(): GitTagger
    {
        return $this->gitCommit;
    }

    public function inputDigest(): InputDigest
    {
        return $this->inputDigest;
    }

    public function setCustomTemplate(CustomTemplateTagger $customTemplate): self
    {
        $this->customTemplate = $customTemplate;

        return $this;
    }

    public function setEnvTemplate(EnvTemplateTagger $envTemplate): self
    {
        $this->envTemplate = $envTemplate;

        return $this;
    }

    public function sha256(): ShaTagger
    {
        return $this->sha256;
    }

    public function jsonSerialize(): array
    {
        return [
            'customTemplate' => $this->customTemplate,
            'dateTime' => $this->dateTime,
            'envTemplate' => $this->envTemplate,
            'gitCommit' => $this->gitCommit,
            'inputDigest' => $this->inputDigest,
            'sha256' => $this->sha256,
        ];
    }
}
