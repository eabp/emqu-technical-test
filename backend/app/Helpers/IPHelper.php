<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class IPHelper
{
    public static function pingIPv4($ip)
    {
        $startTime = microtime(true);
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec("ping -n 1 $ip", $output, $exitCode);
        } else {
            exec("ping -c 1 $ip", $output, $exitCode);
        }
        $endTime = microtime(true);

        $responseTimeMs = ($endTime - $startTime) * 1000;

        if ($exitCode === 0) {
            return ['success' => true, 'response_time' => $responseTimeMs];
        } else {
            return ['success' => false, 'response_time' => $responseTimeMs];
        }
    }
}
