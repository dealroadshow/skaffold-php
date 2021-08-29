<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes the resource requirements for the kaniko pod.
 */
class ResourceRequirements implements JsonSerializable
{
    /**
     * [resource
     * limits](https://kubernetes.io/docs/concepts/configuration/manage-compute-resources-container/#resource-requests-and-limits-of-pod-and-container)
     * for the Kaniko pod.
     */
    private ResourceRequirement $limits;

    /**
     * [resource
     * requests](https://kubernetes.io/docs/concepts/configuration/manage-compute-resources-container/#resource-requests-and-limits-of-pod-and-container)
     * for the Kaniko pod.
     */
    private ResourceRequirement $requests;

    public function __construct()
    {
        $this->limits = new ResourceRequirement();
        $this->requests = new ResourceRequirement();
    }

    public function limits(): ResourceRequirement
    {
        return $this->limits;
    }

    public function requests(): ResourceRequirement
    {
        return $this->requests;
    }

    public function jsonSerialize(): array
    {
        return [
            'limits' => $this->limits,
            'requests' => $this->requests,
        ];
    }
}
