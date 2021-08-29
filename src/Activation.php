<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * criteria by which a profile is auto-activated.
 */
class Activation implements JsonSerializable
{
    /**
     * a Skaffold command for which the profile is auto-activated.
     */
    private string|null $command = null;

    /**
     * a `key=pattern` pair. The profile is auto-activated if an Environment Variable
     * `key` matches the pattern. If the pattern starts with `!`, activation happens if
     * the remaining pattern is _not_ matched. The pattern matches if the Environment
     * Variable value is exactly `pattern`, or the regex `pattern` is found in it. An
     * empty `pattern` (e.g. `env: "key="`) always only matches if the Environment
     * Variable is undefined or empty.
     */
    private string|null $env = null;

    /**
     * a Kubernetes context for which the profile is auto-activated.
     */
    private string|null $kubeContext = null;

    public function __construct()
    {
    }

    public function getCommand(): string|null
    {
        return $this->command;
    }

    public function getEnv(): string|null
    {
        return $this->env;
    }

    public function getKubeContext(): string|null
    {
        return $this->kubeContext;
    }

    public function setCommand(string $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function setEnv(string $env): self
    {
        $this->env = $env;

        return $this;
    }

    public function setKubeContext(string $kubeContext): self
    {
        $this->kubeContext = $kubeContext;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
            'env' => $this->env,
            'kubeContext' => $this->kubeContext,
        ];
    }
}
