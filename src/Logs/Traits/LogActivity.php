<?php


namespace TANGENT\Logs\Traits;


trait LogActivity
{
    public static function logActivity($activity)
    {
        $logFile = '../activity_log.txt';

        $logEntry = date('Y-m-d H:i:s') . ' - ' . $activity . PHP_EOL;

        file_put_contents($logFile, $logEntry, FILE_APPEND);
    }

}