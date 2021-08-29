<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * contains all the configuration needed by the deploy steps.
 */
class DeployConfig implements JsonSerializable
{
    /**
     * *beta* uses the `helm` CLI to apply the charts to the cluster.
     */
    private HelmDeploy $helm;

    /**
     * *alpha* uses the `kpt` CLI to manage and deploy manifests.
     */
    private KptDeploy|null $kpt = null;

    /**
     * Kubernetes context that Skaffold should deploy to.
     */
    private string|null $kubeContext = null;

    /**
     * *beta* uses a client side `kubectl apply` to deploy manifests. You'll need a
     * `kubectl` CLI version installed that's compatible with your cluster.
     */
    private KubectlDeploy $kubectl;

    /**
     * *beta* uses the `kustomize` CLI to "patch" a deployment for a target
     * environment.
     */
    private KustomizeDeploy $kustomize;

    /**
     * configures how container logs are printed as a result of a deployment.
     */
    private LogsConfig $logs;

    /**
     * *beta* enables waiting for deployments to stabilize.
     */
    private bool|null $statusCheck = null;

    /**
     * *beta* deadline for deployments to stabilize in seconds.
     */
    private int|null $statusCheckDeadlineSeconds = null;

    public function __construct()
    {
        $this->helm = new HelmDeploy();
        $this->kubectl = new KubectlDeploy();
        $this->kustomize = new KustomizeDeploy();
        $this->logs = new LogsConfig();
    }

    public function getKpt(): KptDeploy|null
    {
        return $this->kpt;
    }

    public function getKubeContext(): string|null
    {
        return $this->kubeContext;
    }

    public function getStatusCheck(): bool|null
    {
        return $this->statusCheck;
    }

    public function getStatusCheckDeadlineSeconds(): int|null
    {
        return $this->statusCheckDeadlineSeconds;
    }

    public function helm(): HelmDeploy
    {
        return $this->helm;
    }

    public function kubectl(): KubectlDeploy
    {
        return $this->kubectl;
    }

    public function kustomize(): KustomizeDeploy
    {
        return $this->kustomize;
    }

    public function logs(): LogsConfig
    {
        return $this->logs;
    }

    public function setKpt(KptDeploy $kpt): self
    {
        $this->kpt = $kpt;

        return $this;
    }

    public function setKubeContext(string $kubeContext): self
    {
        $this->kubeContext = $kubeContext;

        return $this;
    }

    public function setStatusCheck(bool $statusCheck): self
    {
        $this->statusCheck = $statusCheck;

        return $this;
    }

    public function setStatusCheckDeadlineSeconds(int $statusCheckDeadlineSeconds): self
    {
        $this->statusCheckDeadlineSeconds = $statusCheckDeadlineSeconds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'helm' => $this->helm,
            'kpt' => $this->kpt,
            'kubeContext' => $this->kubeContext,
            'kubectl' => $this->kubectl,
            'kustomize' => $this->kustomize,
            'logs' => $this->logs,
            'statusCheck' => $this->statusCheck,
            'statusCheckDeadlineSeconds' => $this->statusCheckDeadlineSeconds,
        ];
    }
}
