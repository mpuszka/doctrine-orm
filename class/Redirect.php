<?php 
declare(strict_types=1);

namespace App;

/**
 * Redirect class
 */
class Redirect 
{
    /**
     * Redirect method
     * @param string $url
     * @param int|null $parameter
     * @param bool $permanent
     */
    public static function redirect(string $url, int $parameter = null, bool $permanent = false): void
    {
        header('Location: ' . $url . $parameter, true, $permanent ? 301 : 302);
        exit();
    }
}