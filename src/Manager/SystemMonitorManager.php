<?php

namespace Mubiridziri\Sysdashsdk\Manager;

class SystemMonitorManager
{
    public function getOSInformation(): ?array
    {
        if (!function_exists("shell_exec") || !is_readable("/etc/os-release")) {
            return null;
        }

        $os = shell_exec('cat /etc/os-release');
        preg_match_all('/.*=/', $os, $matchListIds);
        $listIds = $matchListIds[0];

        preg_match_all('/=.*/', $os, $matchListVal);
        $listVal = $matchListVal[0];

        array_walk($listIds, function (&$v, $k) {
            $v = strtolower(str_replace('=', '', $v));
        });

        array_walk($listVal, function (&$v, $k) {
            $v = preg_replace('/[="]/', '', $v);
        });

        return array_combine($listIds, $listVal);
    }

    public function getSystemMemoryInfo(): ?array
    {
        if (!is_readable("/proc/meminfo")) {
            return null;
        }

        $data = explode("\n", file_get_contents("/proc/meminfo"));
        $memoryInfo = [];
        foreach ($data as $line) {
            list($key, $val) = explode(":", $line);
            $memoryInfo[$key] = trim($val);
        }
        return $memoryInfo;
    }

    public function getSystemDiskSpaceInfo(): array
    {
        return [
            'usage' => disk_free_space("/"),
            'total' => disk_total_space("/")
        ];
    }

    public function getConnections(): int
    {
        return `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;

    }

    public function getTotalConnections(): int
    {
        return `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
    }

}
