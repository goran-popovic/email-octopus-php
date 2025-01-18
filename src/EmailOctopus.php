<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus;

use Exception;

final class EmailOctopus
{
    /**
     * Creates a new Open AI Client with the given API token.
     *
     * @throws Exception
     */
    public static function client(
        string $apiKey,
        ?string $baseUri = null,
        ?int $timeout = null,
        ?int $connectTimeout = null
    ): Client
    {
        return self::factory()
            ->setApiKey($apiKey)
            ->setBaseUri($baseUri)
            ->setTimeout($timeout)
            ->setConnectTimeout($connectTimeout)
            ->create();
    }

    /**
     * Creates a new factory instance to configure the Email Octopus Client
     */
    private static function factory(): Factory
    {
        return new Factory();
    }
}
