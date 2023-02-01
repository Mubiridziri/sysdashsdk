<?php

namespace Mubiridziri\Sysdashsdk\Manager;

use Mubiridziri\Sysdashsdk\Model\Log;
use Mubiridziri\Sysdashsdk\Model\Metric;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class Manager
{
    private string $address;

    private string $token;

    private SerializerInterface $serializer;

    private HttpClientInterface $client;

    public function __construct(string $address, string $token, SerializerInterface $serializer, HttpClientInterface $client)
    {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->address = $address;
        $this->token = $token;
    }

    public function sendLog(Log $log): void
    {
        $log->setServiceToken($this->token);
        $json = $this->serializer->serialize($log, 'json');
        $this->send($json, "/api/public/v1/events/log");
    }

    public function sendMetric(Metric $metric): void
    {
        $metric->setServiceToken($this->token);
        $json = $this->serializer->serialize($metric, 'json');
        $this->send($json, "/api/public/v1/events/metric");
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function send(string $json, string $route): void
    {
        $this->client->request('POST', $this->address . $route, [
            'body' => $json,
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);
    }
}
