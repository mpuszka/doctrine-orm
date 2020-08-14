<?php 
declare(strict_types=1);

namespace App;

class Redirect 
{
    public static function redirect(string $url, int $parameter = null, bool $permanent = false): void
    {
        header('Location: ' . $url . $parameter, true, $permanent ? 301 : 302);

        exit();
    }
}