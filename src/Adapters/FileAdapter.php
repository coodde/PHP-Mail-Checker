<?php

namespace Coodde\MailChecker\Adapters;

use SplFileObject;

/**
 * @internal
 */
final class FileAdapter implements AdapterInterface
{
    public function search(string $domain, string $listing): bool
    {
        $filepath = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', 'data', "$listing.csv"]);
        $file = new SplFileObject($filepath);
        $file->seek($file->getSize());

        $leftPointer = 0;
        $rightPointer = $file->key() - 1;
        $midPointer = 0;
        $file->seek($midPointer);
        $line = trim($file->current()); // @phpstan-ignore argument.type
        if ($line === $domain) {
            return true;
        }
        do {
            if ($domain > $line) {
                $leftPointer = $midPointer;
            } else {
                $rightPointer = $midPointer;
            }

            if ($rightPointer - $leftPointer <= 1) {
                $file->next();

                return rtrim($file->current()) === $domain; // @phpstan-ignore argument.type
            }
            $midPointer = (int) floor(($leftPointer + $rightPointer) / 2);
            $file->seek($midPointer);
            $line = rtrim($file->current()); // @phpstan-ignore argument.type
        } while ($line !== $domain);

        return true;
    }
}
