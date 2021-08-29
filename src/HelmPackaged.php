<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * parameters for packaging helm chart (`helm package`).
 */
class HelmPackaged implements JsonSerializable
{
    /**
     * sets the `appVersion` on the chart to this version.
     */
    private string|null $appVersion = null;

    /**
     * sets the `version` on the chart to this semver version.
     */
    private string|null $version = null;

    public function __construct()
    {
    }

    public function getAppVersion(): string|null
    {
        return $this->appVersion;
    }

    public function getVersion(): string|null
    {
        return $this->version;
    }

    public function setAppVersion(string $appVersion): self
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'appVersion' => $this->appVersion,
            'version' => $this->version,
        ];
    }
}
