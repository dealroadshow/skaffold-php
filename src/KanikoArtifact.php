<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\MixedList;
use Dealroadshow\Skaffold\Data\Collection\StringList;
use Dealroadshow\Skaffold\Data\Collection\StringMap;
use JsonSerializable;

/**
 * describes an artifact built from a Dockerfile, with kaniko.
 */
class KanikoArtifact implements JsonSerializable
{
    /**
     * arguments passed to the docker build. It also accepts environment variables and
     * generated values via the go template syntax. Exposed generated values:
     * IMAGE_REPO, IMAGE_NAME, IMAGE_TAG.
     */
    private StringMap $buildArgs;

    /**
     * configures Kaniko caching. If a cache is specified, Kaniko will use a remote
     * cache which will speed up builds.
     */
    private KanikoCache $cache;

    /**
     * to clean the filesystem at the end of the build.
     */
    private bool|null $cleanup = null;

    /**
     * to specify a file in the container. This file will receive the digest of a built
     * image. This can be used to automatically track the exact image built by kaniko.
     */
    private string|null $digestFile = null;

    /**
     * locates the Dockerfile relative to workspace.
     */
    private string|null $dockerfile = null;

    /**
     * environment variables passed to the kaniko pod. It also accepts environment
     * variables via the go template syntax.
     */
    private MixedList $env;

    /**
     * building outside of a container.
     */
    private bool|null $force = null;

    /**
     * Docker image used by the Kaniko pod. Defaults to the latest released version of
     * `gcr.io/kaniko-project/executor`.
     */
    private string|null $image = null;

    /**
     * number of retries that should happen for extracting an image filesystem.
     */
    private string|null $imageFSExtractRetry = null;

    /**
     * specify a file to save the image name with digest of the built image to.
     */
    private string|null $imageNameWithDigestFile = null;

    /**
     * image used to run init container which mounts kaniko context.
     */
    private string|null $initImage = null;

    /**
     * if you want to push images to a plain HTTP registry.
     */
    private bool|null $insecure = null;

    /**
     * if you want to pull images from a plain HTTP registry.
     */
    private bool|null $insecurePull = null;

    /**
     * to use plain HTTP requests when accessing a registry.
     */
    private StringList $insecureRegistry;

    /**
     * key: value to set some metadata to the final image. This is equivalent as using
     * the LABEL within the Dockerfile.
     */
    private StringMap $label;

    /**
     * <text|color|json> to set the log format.
     */
    private string|null $logFormat = null;

    /**
     * to add timestamps to log format.
     */
    private bool|null $logTimestamp = null;

    /**
     * if you only want to build the image, without pushing to a registry.
     */
    private bool|null $noPush = null;

    /**
     * to specify a directory in the container where the OCI image layout of a built
     * image will be placed. This can be used to automatically track the exact image
     * built by kaniko.
     */
    private string|null $ociLayoutPath = null;

    /**
     * Set this flag to the number of retries that should happen for the push of an
     * image to a remote destination.
     */
    private string|null $pushRetry = null;

    /**
     * to provide a certificate for TLS communication with a given registry.
     * my.registry.url: /path/to/the/certificate.cert is the expected format.
     */
    private StringMap $registryCertificate;

    /**
     * if you want to use a registry mirror instead of default `index.docker.io`.
     */
    private string|null $registryMirror = null;

    /**
     * used to strip timestamps out of the built image.
     */
    private bool|null $reproducible = null;

    /**
     * takes a single snapshot of the filesystem at the end of the build. So only one
     * layer will be appended to the base image.
     */
    private bool|null $singleSnapshot = null;

    /**
     * skips TLS certificate validation when pushing to a registry.
     */
    private bool|null $skipTLS = null;

    /**
     * skips TLS certificate validation when pulling from a registry.
     */
    private bool|null $skipTLSVerifyPull = null;

    /**
     * skips TLS certificate validation when accessing a registry.
     */
    private StringList $skipTLSVerifyRegistry;

    /**
     * builds only used stages if defined to true. Otherwise it builds by default all
     * stages, even the unnecessaries ones until it reaches the target stage / end of
     * Dockerfile.
     */
    private bool|null $skipUnusedStages = null;

    /**
     * how Kaniko will snapshot the filesystem.
     */
    private string|null $snapshotMode = null;

    /**
     * path to save the image as a tarball at path instead of pushing the image.
     */
    private string|null $tarPath = null;

    /**
     * to indicate which build stage is the target build stage.
     */
    private string|null $target = null;

    /**
     * to Use the experimental run implementation for detecting changes without
     * requiring file system snapshots. In some cases, this may improve build
     * performance by 75%.
     */
    private bool|null $useNewRun = null;

    /**
     * <panic|fatal|error|warn|info|debug|trace> to set the logging level.
     */
    private string|null $verbosity = null;

    /**
     * volume mounts passed to kaniko pod.
     */
    private MixedList $volumeMounts;

    /**
     * used to ignore `/var/run` when taking image snapshot. Set it to false to
     * preserve /var/run/* in destination image.
     */
    private bool|null $whitelistVarRun = null;

    public function __construct()
    {
        $this->buildArgs = new StringMap();
        $this->cache = new KanikoCache();
        $this->env = new MixedList();
        $this->insecureRegistry = new StringList();
        $this->label = new StringMap();
        $this->registryCertificate = new StringMap();
        $this->skipTLSVerifyRegistry = new StringList();
        $this->volumeMounts = new MixedList();
    }

    public function buildArgs(): StringMap
    {
        return $this->buildArgs;
    }

    public function cache(): KanikoCache
    {
        return $this->cache;
    }

    public function env(): MixedList
    {
        return $this->env;
    }

    public function getCleanup(): bool|null
    {
        return $this->cleanup;
    }

    public function getDigestFile(): string|null
    {
        return $this->digestFile;
    }

    public function getDockerfile(): string|null
    {
        return $this->dockerfile;
    }

    public function getForce(): bool|null
    {
        return $this->force;
    }

    public function getImage(): string|null
    {
        return $this->image;
    }

    public function getImageFSExtractRetry(): string|null
    {
        return $this->imageFSExtractRetry;
    }

    public function getImageNameWithDigestFile(): string|null
    {
        return $this->imageNameWithDigestFile;
    }

    public function getInitImage(): string|null
    {
        return $this->initImage;
    }

    public function getInsecure(): bool|null
    {
        return $this->insecure;
    }

    public function getInsecurePull(): bool|null
    {
        return $this->insecurePull;
    }

    public function getLogFormat(): string|null
    {
        return $this->logFormat;
    }

    public function getLogTimestamp(): bool|null
    {
        return $this->logTimestamp;
    }

    public function getNoPush(): bool|null
    {
        return $this->noPush;
    }

    public function getOciLayoutPath(): string|null
    {
        return $this->ociLayoutPath;
    }

    public function getPushRetry(): string|null
    {
        return $this->pushRetry;
    }

    public function getRegistryMirror(): string|null
    {
        return $this->registryMirror;
    }

    public function getReproducible(): bool|null
    {
        return $this->reproducible;
    }

    public function getSingleSnapshot(): bool|null
    {
        return $this->singleSnapshot;
    }

    public function getSkipTLS(): bool|null
    {
        return $this->skipTLS;
    }

    public function getSkipTLSVerifyPull(): bool|null
    {
        return $this->skipTLSVerifyPull;
    }

    public function getSkipUnusedStages(): bool|null
    {
        return $this->skipUnusedStages;
    }

    public function getSnapshotMode(): string|null
    {
        return $this->snapshotMode;
    }

    public function getTarPath(): string|null
    {
        return $this->tarPath;
    }

    public function getTarget(): string|null
    {
        return $this->target;
    }

    public function getUseNewRun(): bool|null
    {
        return $this->useNewRun;
    }

    public function getVerbosity(): string|null
    {
        return $this->verbosity;
    }

    public function getWhitelistVarRun(): bool|null
    {
        return $this->whitelistVarRun;
    }

    public function insecureRegistry(): StringList
    {
        return $this->insecureRegistry;
    }

    public function label(): StringMap
    {
        return $this->label;
    }

    public function registryCertificate(): StringMap
    {
        return $this->registryCertificate;
    }

    public function setCleanup(bool $cleanup): self
    {
        $this->cleanup = $cleanup;

        return $this;
    }

    public function setDigestFile(string $digestFile): self
    {
        $this->digestFile = $digestFile;

        return $this;
    }

    public function setDockerfile(string $dockerfile): self
    {
        $this->dockerfile = $dockerfile;

        return $this;
    }

    public function setForce(bool $force): self
    {
        $this->force = $force;

        return $this;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFSExtractRetry(string $imageFSExtractRetry): self
    {
        $this->imageFSExtractRetry = $imageFSExtractRetry;

        return $this;
    }

    public function setImageNameWithDigestFile(string $imageNameWithDigestFile): self
    {
        $this->imageNameWithDigestFile = $imageNameWithDigestFile;

        return $this;
    }

    public function setInitImage(string $initImage): self
    {
        $this->initImage = $initImage;

        return $this;
    }

    public function setInsecure(bool $insecure): self
    {
        $this->insecure = $insecure;

        return $this;
    }

    public function setInsecurePull(bool $insecurePull): self
    {
        $this->insecurePull = $insecurePull;

        return $this;
    }

    public function setLogFormat(string $logFormat): self
    {
        $this->logFormat = $logFormat;

        return $this;
    }

    public function setLogTimestamp(bool $logTimestamp): self
    {
        $this->logTimestamp = $logTimestamp;

        return $this;
    }

    public function setNoPush(bool $noPush): self
    {
        $this->noPush = $noPush;

        return $this;
    }

    public function setOciLayoutPath(string $ociLayoutPath): self
    {
        $this->ociLayoutPath = $ociLayoutPath;

        return $this;
    }

    public function setPushRetry(string $pushRetry): self
    {
        $this->pushRetry = $pushRetry;

        return $this;
    }

    public function setRegistryMirror(string $registryMirror): self
    {
        $this->registryMirror = $registryMirror;

        return $this;
    }

    public function setReproducible(bool $reproducible): self
    {
        $this->reproducible = $reproducible;

        return $this;
    }

    public function setSingleSnapshot(bool $singleSnapshot): self
    {
        $this->singleSnapshot = $singleSnapshot;

        return $this;
    }

    public function setSkipTLS(bool $skipTLS): self
    {
        $this->skipTLS = $skipTLS;

        return $this;
    }

    public function setSkipTLSVerifyPull(bool $skipTLSVerifyPull): self
    {
        $this->skipTLSVerifyPull = $skipTLSVerifyPull;

        return $this;
    }

    public function setSkipUnusedStages(bool $skipUnusedStages): self
    {
        $this->skipUnusedStages = $skipUnusedStages;

        return $this;
    }

    public function setSnapshotMode(string $snapshotMode): self
    {
        $this->snapshotMode = $snapshotMode;

        return $this;
    }

    public function setTarPath(string $tarPath): self
    {
        $this->tarPath = $tarPath;

        return $this;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function setUseNewRun(bool $useNewRun): self
    {
        $this->useNewRun = $useNewRun;

        return $this;
    }

    public function setVerbosity(string $verbosity): self
    {
        $this->verbosity = $verbosity;

        return $this;
    }

    public function setWhitelistVarRun(bool $whitelistVarRun): self
    {
        $this->whitelistVarRun = $whitelistVarRun;

        return $this;
    }

    public function skipTLSVerifyRegistry(): StringList
    {
        return $this->skipTLSVerifyRegistry;
    }

    public function volumeMounts(): MixedList
    {
        return $this->volumeMounts;
    }

    public function jsonSerialize(): array
    {
        return [
            'buildArgs' => $this->buildArgs,
            'cache' => $this->cache,
            'cleanup' => $this->cleanup,
            'digestFile' => $this->digestFile,
            'dockerfile' => $this->dockerfile,
            'env' => $this->env,
            'force' => $this->force,
            'image' => $this->image,
            'imageFSExtractRetry' => $this->imageFSExtractRetry,
            'imageNameWithDigestFile' => $this->imageNameWithDigestFile,
            'initImage' => $this->initImage,
            'insecure' => $this->insecure,
            'insecurePull' => $this->insecurePull,
            'insecureRegistry' => $this->insecureRegistry,
            'label' => $this->label,
            'logFormat' => $this->logFormat,
            'logTimestamp' => $this->logTimestamp,
            'noPush' => $this->noPush,
            'ociLayoutPath' => $this->ociLayoutPath,
            'pushRetry' => $this->pushRetry,
            'registryCertificate' => $this->registryCertificate,
            'registryMirror' => $this->registryMirror,
            'reproducible' => $this->reproducible,
            'singleSnapshot' => $this->singleSnapshot,
            'skipTLS' => $this->skipTLS,
            'skipTLSVerifyPull' => $this->skipTLSVerifyPull,
            'skipTLSVerifyRegistry' => $this->skipTLSVerifyRegistry,
            'skipUnusedStages' => $this->skipUnusedStages,
            'snapshotMode' => $this->snapshotMode,
            'tarPath' => $this->tarPath,
            'target' => $this->target,
            'useNewRun' => $this->useNewRun,
            'verbosity' => $this->verbosity,
            'volumeMounts' => $this->volumeMounts,
            'whitelistVarRun' => $this->whitelistVarRun,
        ];
    }
}
