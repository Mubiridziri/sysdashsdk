<?php

namespace Mubiridziri\Sysdashsdk\Manager;

use Mubiridziri\Sysdashsdk\Model\Log;
use Mubiridziri\Sysdashsdk\Model\Metric;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class Manager
{

    const LOG = 'log';

    const METRIC = 'metric';

    private SerializerInterface $serializer;

    private HttpClientInterface $client;

    public function __construct(SerializerInterface $serializer, HttpClientInterface $client)
    {
        $this->serializer = $serializer;
        $this->client = $client;
    }

    public function sendLog(Log $log): void
    {
        $json = $this->serializer->serialize($log, 'json');
        $this->send($json, self::LOG);
    }

    public function sendMetric(Metric $metric): void
    {
        $json = $this->serializer->serialize($metric, 'json');
        $this->send($json, self::METRIC);
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function send(string $json, $type): void
    {
        $this->client->request('POST', '<url>', [
            'body' => $json,
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);
    }
}
