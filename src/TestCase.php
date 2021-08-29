<?php 

namespace Dealroadshow\Skaffold;

use Dealroadshow\Skaffold\Data\Collection\CustomTestList;
use Dealroadshow\Skaffold\Data\Collection\StringList;
use JsonSerializable;

/**
 * a list of tests to run on images that Skaffold builds.
 */
class TestCase implements JsonSerializable
{
    /**
     * directory containing the test sources.
     */
    private string|null $context = null;

    /**
     * the set of custom tests to run after an artifact is built.
     */
    private CustomTestList $custom;

    /**
     * artifact on which to run those tests.
     */
    private string $image;

    /**
     * the [Container Structure
     * Tests](https://github.com/GoogleContainerTools/container-structure-test) to run
     * on that artifact.
     */
    private StringList $structureTests;

    /**
     * additional configuration arguments passed to `container-structure-test` binary.
     */
    private StringList $structureTestsArgs;

    public function __construct(string $image)
    {
        $this->custom = new CustomTestList();
        $this->image = $image;
        $this->structureTests = new StringList();
        $this->structureTestsArgs = new StringList();
    }

    public function custom(): CustomTestList
    {
        return $this->custom;
    }

    public function getContext(): string|null
    {
        return $this->context;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function structureTests(): StringList
    {
        return $this->structureTests;
    }

    public function structureTestsArgs(): StringList
    {
        return $this->structureTestsArgs;
    }

    public function jsonSerialize(): array
    {
        return [
            'context' => $this->context,
            'custom' => $this->custom,
            'image' => $this->image,
            'structureTests' => $this->structureTests,
            'structureTestsArgs' => $this->structureTestsArgs,
        ];
    }
}
