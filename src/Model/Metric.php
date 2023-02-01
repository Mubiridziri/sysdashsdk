<?php

namespace Mubiridziri\Sysdashsdk\Model;

class Metric
{
    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    private string $type;

    private string $message;

    private string $serviceToken;

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
    public function getMessage(): string
    {
        return $this->message;
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
