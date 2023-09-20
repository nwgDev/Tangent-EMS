<?php

function logActivity($activity)
{
    $logFile = 'activity_log.txt';

    $logEntry = date('Y-m-d H:i:s') . ' - ' . $activity . PHP_EOL;

    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

if (isset($_GET['activity']) && !empty($_GET['activity'])) {
    $activity = $_GET['activity'];
    logActivity($activity);
}

