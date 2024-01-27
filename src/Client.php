<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus;

use GoranPopovic\EmailOctopus\Resources\Automations;
use GoranPopovic\EmailOctopus\Resources\Campaigns;
use GoranPopovic\EmailOctopus\Resources\Lists;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    private $client;

    public function __construct(GuzzleClient $client)
    {
        $this->client = $client;
    }

    /**
     * Resource to interact with your automations
     *
     * @see https://emailoctopus.com/api-documentation/automations
     */
    public function automations(): Automations
    {
        return new Automations($this->client);
    }

    /**
     * Resource to interact with your lists
     *
     * @see https://emailoctopus.com/api-documentation/lists
     */
    public function lists(): Lists
    {
        return new Lists($this->client);
    }

    /**
     * Resource to interact with your campaigns
     *
     * @see https://emailoctopus.com/api-documentation/campaigns
     */
    public function campaigns(): Campaigns
    {
        return new Campaigns($this->client);
    }
}
