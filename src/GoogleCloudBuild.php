<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* describes how to do a remote build on [Google Cloud
 * Build](https://cloud.google.com/cloud-build/docs/). Docker and Jib artifacts can
 * be built on Cloud Build. The `projectId` needs to be provided and the currently
 * logged in user should be given permissions to trigger new builds.
 */
class GoogleCloudBuild implements JsonSerializable
{
    /**
     * how many artifacts can be built concurrently. 0 means "no-limit".
     */
    private int|null $concurrency = null;

    /**
     * disk size of the VM that runs the build. See [Cloud Build
     * Reference](https://cloud.google.com/cloud-build/docs/api/reference/rest/v1/projects.builds#buildoptions).
     */
    private int|null $diskSizeGb = null;

    /**
     * image that runs a Docker build. See [Cloud
     * Builders](https://cloud.google.com/cloud-build/docs/cloud-builders).
     */
    private string|null $dockerImage = null;

    /**
     * image that runs a Gradle build. See [Cloud
     * Builders](https://cloud.google.com/cloud-build/docs/cloud-builders).
     */
    private string|null $gradleImage = null;

    /**
     * image that runs a Kaniko build. See [Cloud
     * Builders](https://cloud.google.com/cloud-build/docs/cloud-builders).
     */
    private string|null $kanikoImage = null;

    /**
     * specifies the behavior when writing build logs to Google Cloud Storage. Valid
     * options are: `STREAM_DEFAULT`: Service may automatically determine build log
     * streaming behavior. `STREAM_ON`:  Build logs should be streamed to Google Cloud
     * Storage. `STREAM_OFF`: Build logs should not be streamed to Google Cloud
     * Storage; they will be written when the build is completed. See [Cloud Build
     * Reference](https://cloud.google.com/cloud-build/docs/api/reference/rest/v1/projects.builds#logstreamingoption).
     */
    private string|null $logStreamingOption = null;

    /**
     * specifies the logging mode. Valid modes are: `LOGGING_UNSPECIFIED`: The service
     * determines the logging mode. `LEGACY`: Stackdriver logging and Cloud Storage
     * logging are enabled (default). `GCS_ONLY`: Only Cloud Storage logging is
     * enabled. See [Cloud Build
     * Reference](https://cloud.google.com/cloud-build/docs/api/reference/rest/v1/projects.builds#loggingmode).
     */
    private string|null $logging = null;

    /**
     * type of the VM that runs the build. See [Cloud Build
     * Reference](https://cloud.google.com/cloud-build/docs/api/reference/rest/v1/projects.builds#buildoptions).
     */
    private string|null $machineType = null;

    /**
     * image that runs a Maven build. See [Cloud
     * Builders](https://cloud.google.com/cloud-build/docs/cloud-builders).
     */
    private string|null $mavenImage = null;

    /**
     * image that runs a Cloud Native Buildpacks build. See [Cloud
     * Builders](https://cloud.google.com/cloud-build/docs/cloud-builders).
     */
    private string|null $packImage = null;

    /**
     * ID of your Cloud Platform Project. If it is not provided, Skaffold will guess it
     * from the image name. For example, given the artifact image name
     * `gcr.io/myproject/image`, Skaffold will use the `myproject` GCP project.
     */
    private string|null $projectId = null;

    /**
     * amount of time (in seconds) that this build should be allowed to run. See [Cloud
     * Build
     * Reference](https://cloud.google.com/cloud-build/docs/api/reference/rest/v1/projects.builds#resource-build).
     */
    private string|null $timeout = null;

    /**
     * configures a pool of workers to run the build.
     */
    private string|null $workerPool = null;

    public function __construct()
    {
    }

    public function getConcurrency(): int|null
    {
        return $this->concurrency;
    }

    public function getDiskSizeGb(): int|null
    {
        return $this->diskSizeGb;
    }

    public function getDockerImage(): string|null
    {
        return $this->dockerImage;
    }

    public function getGradleImage(): string|null
    {
        return $this->gradleImage;
    }

    public function getKanikoImage(): string|null
    {
        return $this->kanikoImage;
    }

    public function getLogStreamingOption(): string|null
    {
        return $this->logStreamingOption;
    }

    public function getLogging(): string|null
    {
        return $this->logging;
    }

    public function getMachineType(): string|null
    {
        return $this->machineType;
    }

    public function getMavenImage(): string|null
    {
        return $this->mavenImage;
    }

    public function getPackImage(): string|null
    {
        return $this->packImage;
    }

    public function getProjectId(): string|null
    {
        return $this->projectId;
    }

    public function getTimeout(): string|null
    {
        return $this->timeout;
    }

    public function getWorkerPool(): string|null
    {
        return $this->workerPool;
    }

    public function setConcurrency(int $concurrency): self
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    public function setDiskSizeGb(int $diskSizeGb): self
    {
        $this->diskSizeGb = $diskSizeGb;

        return $this;
    }

    public function setDockerImage(string $dockerImage): self
    {
        $this->dockerImage = $dockerImage;

        return $this;
    }

    public function setGradleImage(string $gradleImage): self
    {
        $this->gradleImage = $gradleImage;

        return $this;
    }

    public function setKanikoImage(string $kanikoImage): self
    {
        $this->kanikoImage = $kanikoImage;

        return $this;
    }

    public function setLogStreamingOption(string $logStreamingOption): self
    {
        $this->logStreamingOption = $logStreamingOption;

        return $this;
    }

    public function setLogging(string $logging): self
    {
        $this->logging = $logging;

        return $this;
    }

    public function setMachineType(string $machineType): self
    {
        $this->machineType = $machineType;

        return $this;
    }

    public function setMavenImage(string $mavenImage): self
    {
        $this->mavenImage = $mavenImage;

        return $this;
    }

    public function setPackImage(string $packImage): self
    {
        $this->packImage = $packImage;

        return $this;
    }

    public function setProjectId(string $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    public function setTimeout(string $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function setWorkerPool(string $workerPool): self
    {
        $this->workerPool = $workerPool;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'concurrency' => $this->concurrency,
            'diskSizeGb' => $this->diskSizeGb,
            'dockerImage' => $this->dockerImage,
            'gradleImage' => $this->gradleImage,
            'kanikoImage' => $this->kanikoImage,
            'logStreamingOption' => $this->logStreamingOption,
            'logging' => $this->logging,
            'machineType' => $this->machineType,
            'mavenImage' => $this->mavenImage,
            'packImage' => $this->packImage,
            'projectId' => $this->projectId,
            'timeout' => $this->timeout,
            'workerPool' => $this->workerPool,
        ];
    }
}
