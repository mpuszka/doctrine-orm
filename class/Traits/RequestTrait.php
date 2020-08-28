<?php
declare(strict_types=1);

namespace App\Traits;

Trait RequestTrait
{
    private function checkRequest(array $request): bool
    {
        $title  = trim($request['title']);
        $body   = trim($request['body']);

        if (empty($title)) {
            return false;
        }

        if (empty($body)) {
            return false;
        }

        return true;
    }
}