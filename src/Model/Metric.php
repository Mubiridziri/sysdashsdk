<?php

namespace Mubiridziri\Sysdashsdk\Model;

final class Metric implements DataModelInterface
{
    public function __construct(string $name, float $value, string $type, array $extra)
    {
       $this->name = $name;
       $this->value = $value;
       $this->type = $type;
       $this->extra = $extra;
    }

    private string $type;

    private string $name;

    private float $value;

    private ?array $extra;

    private string $serviceToken;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return array|null
     */
    public function getExtra(): ?array
    {
        return $this->extra;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getServiceToken(): string
    {
        return $this->serviceToken;
    }

    /**
     * @param string $serviceToken
     */
    public function setServiceToken(string $serviceToken): void
    {
        $this->serviceToken = $serviceToken;
    }
}
