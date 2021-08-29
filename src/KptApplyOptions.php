<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * adds additional configurations used when calling `kpt live apply`.
 */
class KptApplyOptions implements JsonSerializable
{
    /**
     * sets for the polling period for resource statuses. Default to 2s.
     */
    private string|null $pollPeriod = null;

    /**
     * sets the propagation policy for pruning. Possible settings are Background,
     * Foreground, Orphan. Default to "Background".
     */
    private string|null $prunePropagationPolicy = null;

    /**
     * sets the time threshold to wait for all pruned resources to be deleted.
     */
    private string|null $pruneTimeout = null;

    /**
     * sets the time threshold to wait for all resources to reach the current status.
     */
    private string|null $reconcileTimeout = null;

    public function __construct()
    {
    }

    public function getPollPeriod(): string|null
    {
        return $this->pollPeriod;
    }

    public function getPrunePropagationPolicy(): string|null
    {
        return $this->prunePropagationPolicy;
    }

    public function getPruneTimeout(): string|null
    {
        return $this->pruneTimeout;
    }

    public function getReconcileTimeout(): string|null
    {
        return $this->reconcileTimeout;
    }

    public function setPollPeriod(string $pollPeriod): self
    {
        $this->pollPeriod = $pollPeriod;

        return $this;
    }

    public function setPrunePropagationPolicy(string $prunePropagationPolicy): self
    {
        $this->prunePropagationPolicy = $prunePropagationPolicy;

        return $this;
    }

    public function setPruneTimeout(string $pruneTimeout): self
    {
        $this->pruneTimeout = $pruneTimeout;

        return $this;
    }

    public function setReconcileTimeout(string $reconcileTimeout): self
    {
        $this->reconcileTimeout = $reconcileTimeout;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'pollPeriod' => $this->pollPeriod,
            'prunePropagationPolicy' => $this->prunePropagationPolicy,
            'pruneTimeout' => $this->pruneTimeout,
            'reconcileTimeout' => $this->reconcileTimeout,
        ];
    }
}
