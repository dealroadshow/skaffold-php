<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * describes the custom test command provided by the user. Custom tests are run
 * after an image build whenever build or test dependencies are changed.
 */
class CustomTest implements JsonSerializable
{
    /**
     * custom command to be executed.  If the command exits with a non-zero return
     * code, the test will be considered to have failed.
     */
    private string $command;

    /**
     * additional test-specific file dependencies; changes to these files will re-run
     * this test.
     */
    private CustomTestDependencies $dependencies;

    /**
     * sets the wait time for skaffold for the command to complete. If unset or 0,
     * Skaffold will wait until the command completes.
     */
    private int|null $timeoutSeconds = null;

    public function __construct(string $command)
    {
        $this->command = $command;
        $this->dependencies = new CustomTestDependencies();
    }

    public function dependencies(): CustomTestDependencies
    {
        return $this->dependencies;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getTimeoutSeconds(): int|null
    {
        return $this->timeoutSeconds;
    }

    public function setCommand(string $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function setTimeoutSeconds(int $timeoutSeconds): self
    {
        $this->timeoutSeconds = $timeoutSeconds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'command' => $this->command,
            'dependencies' => $this->dependencies,
            'timeoutSeconds' => $this->timeoutSeconds,
        ];
    }
}
