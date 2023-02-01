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

    private SerializerInterface $serializer;

    private HttpClientInterface $client;

    public function __construct(string $address, SerializerInterface $serializer, HttpClientInterface $client)
    {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->address = $address;
    }

    public function sendLog(Log $log): void
    {
        $json = $this->serializer->serialize($log, 'json');
        $this->send($json, "/api/public/v1/events/logs");
    }

    public function sendMetric(Metric $metric): void
    {
        $json = $this->serializer->serialize($metric, 'json');
        $this->send($json, "/api/public/v1/events/metrics");
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
