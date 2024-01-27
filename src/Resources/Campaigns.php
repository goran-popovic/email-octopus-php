<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus\Resources;

use GoranPopovic\EmailOctopus\Requests\Request;
use GuzzleHttp\Client;

final class Campaigns
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get details of a campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/get
     *
     * @return array|mixed
     */
    public function get(string $campaignId)
    {
        $url = "campaigns/$campaignId";

        return Request::create($this->client, $url);
    }

    /**
     * Get details of all campaigns.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/get-all
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getAll(array $params = [])
    {
        $url = "campaigns";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get a summary of the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-summary
     *
     * @return array|mixed
     */
    public function getReportSummary(string $campaignId)
    {
        $url = "campaigns/$campaignId/reports/summary";

        return Request::create($this->client, $url);
    }

    /**
     * Get information on the performance of links in the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-links
     *
     * @return array|mixed
     */
    public function getReportLinks(string $campaignId)
    {
        $url = "campaigns/$campaignId/reports/links";

        return Request::create($this->client, $url);
    }

    /**
     * Get information on the contacts who the campaign was sent to but bounced.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-bounced
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportBounced(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/bounced";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who clicked a link in the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-clicked
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportClicked(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/clicked";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who complained about the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-complained
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportComplained(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/complained";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who opened the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-opened
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportOpened(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/opened";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who the campaign was sent to.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-sent
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportSent(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/sent";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who unsubscribed using a link in the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-unsubscribed
     *
     * @return array|mixed
     */
    public function getReportUnsubscribed(string $campaignId)
    {
        $url = "campaigns/$campaignId/reports/unsubscribed";

        return Request::create($this->client, $url);
    }

    /**
     * Get information on the contacts who didn't click a link in the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-not-clicked
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportNotClicked(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/not-clicked";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get information on the contacts who didn't open the campaign.
     *
     * @see https://emailoctopus.com/api-documentation/campaigns/report/get-not-opened
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getReportNotOpened(string $campaignId, array $params = [])
    {
        $url = "campaigns/$campaignId/reports/not-opened";

        return Request::create($this->client, $url, $params);
    }
}
