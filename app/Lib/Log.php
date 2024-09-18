<?php

namespace App\Lib;

use DateTime;

class Log
{
    const LOG_LEVEL_ERROR = "ERROR";
    const LOG_LEVEL_WARNING = "WARNING";
    const LOG_LEVEL_INFO = "INFO";
    const LOG_FILE = ROOT_PATH . "logs/app.log";

    /**
     * @param  string  $message  The message that should be logged
     * @param  string  $level    The level of urgency for the log
     */
    private function log(string $message, string $level = self::LOG_LEVEL_INFO)
    {
        $datetime = new DateTime('Europe/Amsterdam');
        $timestamp = $datetime->format('d/m/Y H:i:s');

        $logMessage = "[$timestamp] | [$level] | $message\n";

        error_log($logMessage, 3, self::LOG_FILE);
    }

    /**
     * Create a log with Error urgency level
     * 
     * @param  string  $message  The message that should be logged
     */
    public static function error(string $message)
    {
        (new self)->log($message, self::LOG_LEVEL_ERROR);
    }

    /**
     * Create a log with Warning urgency level
     * 
     * @param  string  $message  The message that should be logged
     */
    public static function warning(string $message)
    {
        (new self)->log($message, self::LOG_LEVEL_WARNING);
    }

    /**
     * Create a log with Info ugency level
     * 
     * @param  string  $message  The message that should be logged
     */
    public static function info(string $message)
    {
        (new self)->log($message, self::LOG_LEVEL_INFO);
    }
}
