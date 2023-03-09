<?php

namespace Mubiridziri\Sysdashsdk\Model;

class SystemMonitor implements DataModelInterface
{
    private ?string $serviceToken;

    private ?array $systemInfo;

    private ?array $ramInfo;

    private array $diskInfo;

    private int $connections;

    private int $totalConnections;

    public function __construct(?array $systemInfo, ?array $ramInfo, array $diskInfo, int $connections, int $totalConnections)
    {
        $this->systemInfo = $systemInfo;
        $this->ramInfo = $ramInfo;
        $this->diskInfo = $diskInfo;
        $this->connections = $connections;
        $this->totalConnections = $totalConnections;
    }

    /**
     * @return int
     */
    public function getConnections(): int
    {
        return $this->connections;
    }

    /**
     * @param int $connections
     */
    public function setConnections(int $connections): void
    {
        $this->connections = $connections;
    }

    /**
     * @return int
     */
    public function getTotalConnections(): int
    {
        return $this->totalConnections;
    }

    /**
     * @param int $totalConnections
     */
    public function setTotalConnections(int $totalConnections): void
    {
        $this->totalConnections = $totalConnections;
    }

    public function setServiceToken(string $token)
    {
        $this->serviceToken = $token;
    }

    /**
     * @return array|null
     */
    public function getSystemInfo(): ?array
    {
        return $this->systemInfo;
    }

    /**
     * @param array|null $systemInfo
     */
    public function setSystemInfo(?array $systemInfo): void
    {
        $this->systemInfo = $systemInfo;
    }

    /**
     * @return array|null
     */
    public function getRamInfo(): ?array
    {
        return $this->ramInfo;
    }

    /**
     * @param array|null $ramInfo
     */
    public function setRamInfo(?array $ramInfo): void
    {
        $this->ramInfo = $ramInfo;
    }

    /**
     * @return array
     */
    public function getDiskInfo(): array
    {
        return $this->diskInfo;
    }

    /**
     * @param array $diskInfo
     */
    public function setDiskInfo(array $diskInfo): void
    {
        $this->diskInfo = $diskInfo;
    }

    /**
     * @return string|null
     */
    public function getServiceToken(): ?string
    {
        return $this->serviceToken;
    }
}
