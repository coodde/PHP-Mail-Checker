<?php

use Coodde\MailChecker\MailChecker;
use Coodde\MailChecker\Regions;
use Coodde\MailChecker\Exceptions\MailCheckException;
use Coodde\MailChecker\Exceptions\DomainMailCheckException;
use Coodde\MailChecker\Exceptions\ListingMailCheckException;
use Coodde\MailChecker\Exceptions\RegionMailCheckException;

describe('validation with exceptions', function (): void {
    it('invalid email exception', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_DANGEROUS]);
        $result = $mailChecker->validate('te@st@07gmail.com');
    })->throws(MailCheckException::class);

    it('dangerous category exception', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_DANGEROUS]);
        $result = $mailChecker->validate('test@07gmail.com');
    })->throws(ListingMailCheckException::class);
});

describe('checkink mail categories allowed', function (): void {
    it('invalid email', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_DANGEROUS]);

        $result = $mailChecker->allowed('te@st@07gmail.com');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test07gmail.com');
        expect($result)->toBe(true);
    });

    it('dangerous email', function (): void {
        $mailChecker = new MailChecker();

        $result = $mailChecker->allowed('test@0-00.usa.cc');
        expect($result)->toBe(false);

        $mailChecker = new MailChecker([MailChecker::CATEGORY_DANGEROUS]);

        // first in list
        $result = $mailChecker->allowed('test@0-00.usa.cc');
        expect($result)->toBe(false);

        // somewhere in the middle
        $result = $mailChecker->allowed('test@07gmail.com');
        expect($result)->toBe(false);

        // last in list
        $result = $mailChecker->allowed('test@zzzzzzzzzzzzz.com');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test@07gmail.com');
        expect($result)->toBe(true);

        $mailChecker = new MailChecker([MailChecker::CATEGORY_SUSPICIOUS]);
        $result = $mailChecker->allowed('test@07gmail.com');
        expect($result)->toBe(true);

        $result = $mailChecker->forbidden('test@07gmail.com');
        expect($result)->toBe(false);
    });

    it('suspicious category', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_SUSPICIOUS]);

        $result = $mailChecker->allowed('test@2net.us');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test@2net.us');
        expect($result)->toBe(true);
    });

    it('paid category', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_PAID]);
        
        $result = $mailChecker->allowed('test@zoho.com');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test@zoho.com');
        expect($result)->toBe(true);
    });

    it('temp category', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_TEMPORARY]);
        
        $result = $mailChecker->allowed('test@bund.us');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test@bund.us');
        expect($result)->toBe(true);
    });

    it('public category', function (): void {
        $mailChecker = new MailChecker([MailChecker::CATEGORY_PUBLIC]);
        
        $result = $mailChecker->allowed('test@gmail.com');
        expect($result)->toBe(false);

        $result = $mailChecker->forbidden('test@yahoo.com');
        expect($result)->toBe(true);
    });
});

describe('checkink mail regions allowed', function (): void {
    it('default regions', function (): void {
        $mailChecker = new MailChecker();
        
        $result = $mailChecker->allowed('test@mail.ru');
        expect($result)->toBe(false);

        $result = $mailChecker->allowed('test@mail.by');
        expect($result)->toBe(false);
    });

    it('forbidden region', function (): void {
        $mailChecker = new MailChecker([], [], [Regions::RUSSIA]);
        
        $result = $mailChecker->allowed('test@mail.ru');
        expect($result)->toBe(false);

        $result = $mailChecker->allowed('test@mail.de');
        expect($result)->toBe(true);
    });
});

describe('checkink mail domains allowed', function (): void {
    it('forbidden domains', function (): void {
        $mailChecker = new MailChecker([], ['ru', 'mail.by']);
        
        $result = $mailChecker->allowed('test@mail.ru');
        expect($result)->toBe(false);

        $result = $mailChecker->allowed('test@mail.by');
        expect($result)->toBe(false);

        $result = $mailChecker->allowed('test@mail.de');
        expect($result)->toBe(true);
    });
});
