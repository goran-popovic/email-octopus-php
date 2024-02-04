<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus\Resources;

use GoranPopovic\EmailOctopus\Requests\Request;
use GuzzleHttp\Client;

final class Automations
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Start an automation for a list contact.
     *
     * @see https://emailoctopus.com/api-documentation/automations/queue
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function start(string $automationId, array $params)
    {
        $url = "automations/$automationId/queue";

        return Request::create($this->client, $url, $params, 'post', 'json');
    }
}
