<?php

namespace Mubiridziri\Sysdashsdk\Manager;

use Mubiridziri\Sysdashsdk\Constant\RoutesConstant;
use Mubiridziri\Sysdashsdk\Model\Log;
use Mubiridziri\Sysdashsdk\Model\Metric;
use Mubiridziri\Sysdashsdk\Service\Transport;

final class Manager
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function sendLog(Log $log): void
    {
        $this->transport->send(RoutesConstant::LOG_ROUTE, $log);
    }

    public function sendMetric(Metric $metric): void
    {
        $this->transport->send(RoutesConstant::METRIC_ROUTE, $metric);
    }
}
