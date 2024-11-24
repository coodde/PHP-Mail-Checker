<?php

namespace Coodde\MailChecker\Adapters;

interface AdapterInterface
{
    public function search(string $domain, string $listing): bool;
}
