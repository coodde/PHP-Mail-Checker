<?php

declare(strict_types=1);

namespace Coodde\MailChecker;

use Coodde\MailChecker\Adapters\File;
use Coodde\MailChecker\Exceptions\DomainMailCheckException;
use Coodde\MailChecker\Exceptions\MailCheckException;
use Coodde\MailChecker\Exceptions\RegionMailCheckException;
use Coodde\MailChecker\Exceptions\ListingMailCheckException;

final class MailChecker
{
    const CATEGORY_PUBLIC = 'public';

    const CATEGORY_DANGEROUS = 'dangerous';

    const CATEGORY_SUSPICIOUS = 'suspicious';

    const CATEGORY_PAID = 'paid';

    const CATEGORY_TEMPORARY = 'temporary';

    /**
     * Forbidden categories
     * @var array<int, string>
     */
    private array $categories;

    /**
     * Forbidden domains
     * @var array<int, string>
     */
    private array $domains;

    /**
     * Forbidden regions
     * @var array<int, string>
     */
    private array $regions;

    /**
     * @param array<int, string> $categories
     * @param array<int, string> $domains
     * @param array<int, string> $regions
     */
    public function __construct(?array $categories = null, ?array $domains = null, ?array $regions = null) {
        $this->categories = $categories ?? [self::CATEGORY_DANGEROUS];
        $this->domains = $domains ?? [];
        // Default list of dangerous and/or terrorist regions to forbid ;)
        $this->regions = $regions ?? ['ru', 'by', 'kp', 'af', 'ir', 'sy', 'su', 'cu'];
    }

    /**
     * @param array<int, string> $regions
     */
    public function forbidRegions(array $regions): void {
        $this->regions = $regions;
    }

    /**
     * @param array<int, string> $categories
     */
    public function forbidCategories(array $categories): void {
        $this->categories = $categories;
    }

    /**
     * @param array<int, string> $domains
     */
    public function forbidDomains(array $domains): void {
        $this->domains = $domains;
    }

    public function validate(string $mail): void
    {
        $mailParts = explode('@', $mail);
        if (count($mailParts) !== 2) {
            throw new MailCheckException('Wrong email format');
        }
        if (!$this->domainsAllowed('@' . $mailParts[1])) {
            throw new DomainMailCheckException('Forbidden domain');
        }

        if (!$this->regionsAllowed($mailParts[1])) {
            throw new RegionMailCheckException('Forbidden region`s domain');
        }

        if (!$this->categoriesAllowed($mailParts[1])) {
            throw new ListingMailCheckException('Forbidden email - found in the configured category');
        }
    }

    public function allowed(string $mail): bool
    {
        $mailParts = explode('@', $mail);
        if (count($mailParts) !== 2) {
            return false;
        }
        return !(!$this->domainsAllowed('@' . $mailParts[1])
            || !$this->regionsAllowed($mailParts[1])
            || !$this->categoriesAllowed($mailParts[1]));
    }

    public function forbidden(string $mail): bool
    {
        return !$this->allowed($mail);
    }

    private function domainsAllowed(string $mailDomain): bool
    {
        foreach ($this->domains as $domain) {
            if (str_ends_with($mailDomain, '@' . $domain)
                || str_ends_with($mailDomain, '.' . $domain)) {
                return false;
            }
        }

        return true;
    }

    private function regionsAllowed(string $mailDomain): bool
    {
        foreach ($this->regions as $region) {
            if (str_ends_with($mailDomain, '.' . $region)) {
                return false;
            }
        }

        return true;
    }

    private function categoriesAllowed(string $mailDomain): bool
    {
        foreach ($this->categories as $category) {
            $found = File::search($mailDomain, $category);
            if ($found) {
                return false;
            }
        }

        return true;
    }
}
