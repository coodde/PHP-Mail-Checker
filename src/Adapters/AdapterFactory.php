<?php

namespace Coodde\MailChecker\Adapters;

use Exception;

final class AdapterFactory
{
    public static function create(string $type): AdapterInterface
    {
        $class = "Coodde\\MailChecker\\Adapters\\$type";
        if (class_exists($class)) {
            // @phpstan-ignore-next-line
            return new $class;
        }
        throw new Exception("Invalid adapter type: $type.");
    }
}
