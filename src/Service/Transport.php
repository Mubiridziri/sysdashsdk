<?php

namespace Mubiridziri\Sysdashsdk\Service;

use Mubiridziri\Sysdashsdk\Model\DataModelInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Transport
{
    private string $address;

    private string $token;

    private HttpClientInterface $client;

    private SerializerInterface $serializer;

    public function __construct(string $address, string $token, HttpClientInterface $client, SerializerInterface $serializer)
    {
        if (empty($address) || empty($token) || $token == 'token') {
            throw new \InvalidArgumentException("Cannot create transport when address or token is empty");
        }

        $this->address = $address;
        $this->token = $token;
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function send(string $route, DataModelInterface $data)
    {
        $data->setServiceToken($this->token);
    }
}
