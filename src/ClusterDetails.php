<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\MixedList;
use Dealroadshow\Skaffold\Data\Collection\StringMap;
use JsonSerializable;

/**
 * *beta* describes how to do an on-cluster build.
 */
class ClusterDetails implements JsonSerializable
{
    /**
     * for kaniko pod.
     */
    private string|null $HTTPS_PROXY = null;

    /**
     * for kaniko pod.
     */
    private string|null $HTTP_PROXY = null;

    /**
     * describes the Kubernetes annotations for the pod.
     */
    private StringMap $annotations;

    /**
     * how many artifacts can be built concurrently. 0 means "no-limit".
     */
    private int|null $concurrency = null;

    /**
     * describes how to mount the local Docker configuration into a pod.
     */
    private DockerConfig $dockerConfig;

    /**
     * Kubernetes namespace. Defaults to current namespace in Kubernetes configuration.
     */
    private string|null $namespace = null;

    /**
     * describes the Kubernetes node selector for the pod.
     */
    private StringMap $nodeSelector;

    /**
     * path the pull secret will be mounted at within the running container.
     */
    private string|null $pullSecretMountPath = null;

    /**
     * name of the Kubernetes secret for pulling base images and pushing the final
     * image. If given, the secret needs to contain the Google Cloud service account
     * secret key under the key `kaniko-secret`.
     */
    private string|null $pullSecretName = null;

    /**
     * path to the Google Cloud service account secret key file.
     */
    private string|null $pullSecretPath = null;

    /**
     * adds a random UUID postfix to the default name of the docker secret to
     * facilitate parallel builds, e.g. docker-cfgfd154022-c761-416f-8eb3-cf8258450b85.
     */
    private bool|null $randomDockerConfigSecret = null;

    /**
     * adds a random UUID postfix to the default name of the pull secret to facilitate
     * parallel builds, e.g.
     * kaniko-secretdocker-cfgfd154022-c761-416f-8eb3-cf8258450b85.
     */
    private bool|null $randomPullSecret = null;

    /**
     * define the resource requirements for the kaniko pod.
     */
    private ResourceRequirements $resources;

    /**
     * defines the UID to request for running the container. If omitted, no
     * SecurityContext will be specified for the pod and will therefore be inherited
     * from the service account.
     */
    private int|null $runAsUser = null;

    /**
     * describes the Kubernetes service account to use for the pod. Defaults to
     * 'default'.
     */
    private string|null $serviceAccount = null;

    /**
     * amount of time (in seconds) that this build is allowed to run. Defaults to 20
     * minutes (`20m`).
     */
    private string|null $timeout = null;

    /**
     * describes the Kubernetes tolerations for the pod.
     */
    private MixedList $tolerations;

    /**
     * defines container mounts for ConfigMap and Secret resources.
     */
    private MixedList $volumes;

    public function __construct()
    {
        $this->annotations = new StringMap();
        $this->dockerConfig = new DockerConfig();
        $this->nodeSelector = new StringMap();
        $this->resources = new ResourceRequirements();
        $this->tolerations = new MixedList();
        $this->volumes = new MixedList();
    }

    public function annotations(): StringMap
    {
        return $this->annotations;
    }

    public function dockerConfig(): DockerConfig
    {
        return $this->dockerConfig;
    }

    public function getConcurrency(): int|null
    {
        return $this->concurrency;
    }

    public function getHTTPS_PROXY(): string|null
    {
        return $this->HTTPS_PROXY;
    }

    public function getHTTP_PROXY(): string|null
    {
        return $this->HTTP_PROXY;
    }

    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    public function getPullSecretMountPath(): string|null
    {
        return $this->pullSecretMountPath;
    }

    public function getPullSecretName(): string|null
    {
        return $this->pullSecretName;
    }

    public function getPullSecretPath(): string|null
    {
        return $this->pullSecretPath;
    }

    public function getRandomDockerConfigSecret(): bool|null
    {
        return $this->randomDockerConfigSecret;
    }

    public function getRandomPullSecret(): bool|null
    {
        return $this->randomPullSecret;
    }

    public function getRunAsUser(): int|null
    {
        return $this->runAsUser;
    }

    public function getServiceAccount(): string|null
    {
        return $this->serviceAccount;
    }

    public function getTimeout(): string|null
    {
        return $this->timeout;
    }

    public function nodeSelector(): StringMap
    {
        return $this->nodeSelector;
    }

    public function resources(): ResourceRequirements
    {
        return $this->resources;
    }

    public function setConcurrency(int $concurrency): self
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    public function setHTTPS_PROXY(string $HTTPS_PROXY): self
    {
        $this->HTTPS_PROXY = $HTTPS_PROXY;

        return $this;
    }

    public function setHTTP_PROXY(string $HTTP_PROXY): self
    {
        $this->HTTP_PROXY = $HTTP_PROXY;

        return $this;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function setPullSecretMountPath(string $pullSecretMountPath): self
    {
        $this->pullSecretMountPath = $pullSecretMountPath;

        return $this;
    }

    public function setPullSecretName(string $pullSecretName): self
    {
        $this->pullSecretName = $pullSecretName;

        return $this;
    }

    public function setPullSecretPath(string $pullSecretPath): self
    {
        $this->pullSecretPath = $pullSecretPath;

        return $this;
    }

    public function setRandomDockerConfigSecret(bool $randomDockerConfigSecret): self
    {
        $this->randomDockerConfigSecret = $randomDockerConfigSecret;

        return $this;
    }

    public function setRandomPullSecret(bool $randomPullSecret): self
    {
        $this->randomPullSecret = $randomPullSecret;

        return $this;
    }

    public function setRunAsUser(int $runAsUser): self
    {
        $this->runAsUser = $runAsUser;

        return $this;
    }

    public function setServiceAccount(string $serviceAccount): self
    {
        $this->serviceAccount = $serviceAccount;

        return $this;
    }

    public function setTimeout(string $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function tolerations(): MixedList
    {
        return $this->tolerations;
    }

    public function volumes(): MixedList
    {
        return $this->volumes;
    }

    public function jsonSerialize(): array
    {
        return [
            'HTTPS_PROXY' => $this->HTTPS_PROXY,
            'HTTP_PROXY' => $this->HTTP_PROXY,
            'annotations' => $this->annotations,
            'concurrency' => $this->concurrency,
            'dockerConfig' => $this->dockerConfig,
            'namespace' => $this->namespace,
            'nodeSelector' => $this->nodeSelector,
            'pullSecretMountPath' => $this->pullSecretMountPath,
            'pullSecretName' => $this->pullSecretName,
            'pullSecretPath' => $this->pullSecretPath,
            'randomDockerConfigSecret' => $this->randomDockerConfigSecret,
            'randomPullSecret' => $this->randomPullSecret,
            'resources' => $this->resources,
            'runAsUser' => $this->runAsUser,
            'serviceAccount' => $this->serviceAccount,
            'timeout' => $this->timeout,
            'tolerations' => $this->tolerations,
            'volumes' => $this->volumes,
        ];
    }
}
