<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus\Requests;

use GuzzleHttp\Client;

final class Request
{
    /**
     * Creates a new Request from the given parameters.
     *
     * @param  array<string, mixed>  $params
     * @return array|mixed
     */
    public static function create(
        Client $client,
        string $url,
        array $params = [],
        string $type = 'get',
        string $dataType = 'query'
    )
    {
        try {
            $response = $client->{$type}($url, [
                $dataType => $params
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ];
        }
    }
}
