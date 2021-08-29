<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\StringList;
use Dealroadshow\Skaffold\Data\Collection\StringMap;
use JsonSerializable;

/**
 * describes a helm release to be deployed.
 */
class HelmRelease implements JsonSerializable
{
    /**
     * key value pairs where the key represents the parameter used in the
     * `--set-string` Helm CLI flag to define a container image and the value
     * corresponds to artifact i.e. `ImageName` defined in `Build.Artifacts` section.
     * The resulting command-line is controlled by `ImageStrategy`.
     */
    private mixed $artifactOverrides;

    /**
     * local path to a packaged Helm chart or an unpacked Helm chart directory.
     */
    private string|null $chartPath = null;

    /**
     * if `true`, Skaffold will send `--create-namespace` flag to Helm CLI.
     * `--create-namespace` flag is available in Helm since version 3.2. Defaults is
     * `false`.
     */
    private bool|null $createNamespace = null;

    /**
     * controls how an `ArtifactOverrides` entry is turned into `--set-string` Helm CLI
     * flag or flags.
     */
    private HelmImageStrategy $imageStrategy;

    /**
     * name of the Helm release. It accepts environment variables via the go template
     * syntax.
     */
    private string $name;

    /**
     * Kubernetes namespace.
     */
    private string|null $namespace = null;

    /**
     * key-value pairs. If present, Skaffold will build a Helm `values` file that
     * overrides the original and use it to call Helm CLI (`--f` flag).
     */
    private mixed $overrides;

    /**
     * parameters for packaging helm chart (`helm package`).
     */
    private HelmPackaged $packaged;

    /**
     * if `true`, Skaffold will send `--recreate-pods` flag to Helm CLI when upgrading
     * a new version of a chart in subsequent dev loop deploy.
     */
    private bool|null $recreatePods = null;

    /**
     * refers to a remote Helm chart reference or URL.
     */
    private string|null $remoteChart = null;

    /**
     * specifies the helm repository for remote charts. If present, Skaffold will send
     * `--repo` Helm CLI flag or flags.
     */
    private string|null $repo = null;

    /**
     * key-value pairs. If present, Skaffold will send `--set-file` flag to Helm CLI
     * and append all pairs after the flag.
     */
    private StringMap $setFiles;

    /**
     * key-value pairs. If present, Skaffold will try to parse the value part of each
     * key-value pair using environment variables in the system, then send `--set` flag
     * to Helm CLI and append all parsed pairs after the flag.
     */
    private mixed $setValueTemplates;

    /**
     * key-value pairs. If present, Skaffold will send `--set` flag to Helm CLI and
     * append all pairs after the flag.
     */
    private mixed $setValues;

    /**
     * should build dependencies be skipped. Ignored for `remoteChart`.
     */
    private bool|null $skipBuildDependencies = null;

    /**
     * specifies whether to upgrade helm chart on code changes. Default is `true` when
     * helm chart is local (has `chartPath`). Default is `false` when helm chart is
     * remote (has `remoteChart`).
     */
    private bool|null $upgradeOnChange = null;

    /**
     * instructs skaffold to use secrets plugin on deployment.
     */
    private bool|null $useHelmSecrets = null;

    /**
     * paths to the Helm `values` files.
     */
    private StringList $valuesFiles;

    /**
     * version of the chart.
     */
    private string|null $version = null;

    /**
     * if `true`, Skaffold will send `--wait` flag to Helm CLI.
     */
    private bool|null $wait = null;

    public function __construct(string $name)
    {
        $this->imageStrategy = new HelmImageStrategy();
        $this->name = $name;
        $this->packaged = new HelmPackaged();
        $this->setFiles = new StringMap();
        $this->valuesFiles = new StringList();
    }

    public function getArtifactOverrides(): mixed
    {
        return $this->artifactOverrides;
    }

    public function getChartPath(): string|null
    {
        return $this->chartPath;
    }

    public function getCreateNamespace(): bool|null
    {
        return $this->createNamespace;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    public function getOverrides(): mixed
    {
        return $this->overrides;
    }

    public function getRecreatePods(): bool|null
    {
        return $this->recreatePods;
    }

    public function getRemoteChart(): string|null
    {
        return $this->remoteChart;
    }

    public function getRepo(): string|null
    {
        return $this->repo;
    }

    public function getSetValueTemplates(): mixed
    {
        return $this->setValueTemplates;
    }

    public function getSetValues(): mixed
    {
        return $this->setValues;
    }

    public function getSkipBuildDependencies(): bool|null
    {
        return $this->skipBuildDependencies;
    }

    public function getUpgradeOnChange(): bool|null
    {
        return $this->upgradeOnChange;
    }

    public function getUseHelmSecrets(): bool|null
    {
        return $this->useHelmSecrets;
    }

    public function getVersion(): string|null
    {
        return $this->version;
    }

    public function getWait(): bool|null
    {
        return $this->wait;
    }

    public function imageStrategy(): HelmImageStrategy
    {
        return $this->imageStrategy;
    }

    public function packaged(): HelmPackaged
    {
        return $this->packaged;
    }

    public function setArtifactOverrides(mixed $artifactOverrides): self
    {
        $this->artifactOverrides = $artifactOverrides;

        return $this;
    }

    public function setChartPath(string $chartPath): self
    {
        $this->chartPath = $chartPath;

        return $this;
    }

    public function setCreateNamespace(bool $createNamespace): self
    {
        $this->createNamespace = $createNamespace;

        return $this;
    }

    public function setFiles(): StringMap
    {
        return $this->setFiles;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function setOverrides(mixed $overrides): self
    {
        $this->overrides = $overrides;

        return $this;
    }

    public function setRecreatePods(bool $recreatePods): self
    {
        $this->recreatePods = $recreatePods;

        return $this;
    }

    public function setRemoteChart(string $remoteChart): self
    {
        $this->remoteChart = $remoteChart;

        return $this;
    }

    public function setRepo(string $repo): self
    {
        $this->repo = $repo;

        return $this;
    }

    public function setSetValueTemplates(mixed $setValueTemplates): self
    {
        $this->setValueTemplates = $setValueTemplates;

        return $this;
    }

    public function setSetValues(mixed $setValues): self
    {
        $this->setValues = $setValues;

        return $this;
    }

    public function setSkipBuildDependencies(bool $skipBuildDependencies): self
    {
        $this->skipBuildDependencies = $skipBuildDependencies;

        return $this;
    }

    public function setUpgradeOnChange(bool $upgradeOnChange): self
    {
        $this->upgradeOnChange = $upgradeOnChange;

        return $this;
    }

    public function setUseHelmSecrets(bool $useHelmSecrets): self
    {
        $this->useHelmSecrets = $useHelmSecrets;

        return $this;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function setWait(bool $wait): self
    {
        $this->wait = $wait;

        return $this;
    }

    public function valuesFiles(): StringList
    {
        return $this->valuesFiles;
    }

    public function jsonSerialize(): array
    {
        return [
            'artifactOverrides' => $this->artifactOverrides,
            'chartPath' => $this->chartPath,
            'createNamespace' => $this->createNamespace,
            'imageStrategy' => $this->imageStrategy,
            'name' => $this->name,
            'namespace' => $this->namespace,
            'overrides' => $this->overrides,
            'packaged' => $this->packaged,
            'recreatePods' => $this->recreatePods,
            'remoteChart' => $this->remoteChart,
            'repo' => $this->repo,
            'setFiles' => $this->setFiles,
            'setValueTemplates' => $this->setValueTemplates,
            'setValues' => $this->setValues,
            'skipBuildDependencies' => $this->skipBuildDependencies,
            'upgradeOnChange' => $this->upgradeOnChange,
            'useHelmSecrets' => $this->useHelmSecrets,
            'valuesFiles' => $this->valuesFiles,
            'version' => $this->version,
            'wait' => $this->wait,
        ];
    }
}
