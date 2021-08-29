<?php 

namespace Dealroadshow\Skaffold;

use JsonSerializable;

/**
 * *beta* tags images with the build timestamp.
 */
class DateTimeTagger implements JsonSerializable
{
    /**
     * formats the date and time. See
     * [#Time.Format](https://golang.org/pkg/time/#Time.Format).
     */
    private string|null $format = null;

    /**
     * sets the timezone for the date and time. See
     * [Time.LoadLocation](https://golang.org/pkg/time/#Time.LoadLocation). Defaults to
     * the local timezone.
     */
    private string|null $timezone = null;

    public function __construct()
    {
    }

    public function getFormat(): string|null
    {
        return $this->format;
    }

    public function getTimezone(): string|null
    {
        return $this->timezone;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'format' => $this->format,
            'timezone' => $this->timezone,
        ];
    }
}
