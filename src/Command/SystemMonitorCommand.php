<?php

namespace Mubiridziri\Sysdashsdk\Command;

use Mubiridziri\Sysdashsdk\Constant\RoutesConstant;
use Mubiridziri\Sysdashsdk\Model\SystemMonitor;
use Mubiridziri\Sysdashsdk\Service\Transport;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SystemMonitorCommand extends Command
{
    protected static $defaultName = "sysdash:monitor:send";

    private SystemMonitor $systemMonitor;

    private Transport $transport;

    public function __construct(SystemMonitor $systemMonitor, Transport $transport)
    {
        parent::__construct(self::$defaultName);
        $this->transport = $transport;
        $this->systemMonitor = $systemMonitor;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $monitorData = new SystemMonitor(
            $this->systemMonitor->getSystemInfo(),
            $this->systemMonitor->getRamInfo(),
            $this->systemMonitor->getDiskInfo(),
            $this->systemMonitor->getConnections(),
            $this->systemMonitor->getTotalConnections()
        );
        $this->transport->send(RoutesConstant::SYSTEM_MONITOR_ROUTE, $monitorData);
    }
}
