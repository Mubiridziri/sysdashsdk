<?php

namespace Mubiridziri\Sysdashsdk\Model;

final class Log
{
    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    private string $type;

    private string $message;

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
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
