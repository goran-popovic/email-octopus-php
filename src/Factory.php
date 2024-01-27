<?php

namespace GoranPopovic\EmailOctopus;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

final class Factory
{
    /**
     * The API key for performing requests.
     */
    private $apiKey = null;

    /**
     * The HTTP client that will perform requests.
     */
    private $httpClient = null;

    /**
     * The base URI of the API.
     */
    private $baseUri = null;

    /**
     * Specify the maximum number of seconds to wait for a response.
     */
    private $timeout = null;

    /**
     * Specify the maximum number of seconds to wait while trying to connect to a server.
     */
    private $connectTimeout = null;

    /**
     * Sets the API key.
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = trim($apiKey);

        return $this;
    }

    /**
     * Sets the base URI for the requests.
     */
    public function setBaseUri(?string $baseUri): self
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * Sets the timeout.
     */
    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Sets the connect timeout.
     */
    public function setConnectTimeout(?int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;

        return $this;
    }

    /**
     * Creates a new Email Octopus Client.
     *
     * @throws Exception
     */
    public function create(): Client
    {
        if ($this->apiKey === null) {
            throw new Exception('Email Octopus API Key is required. Please set it in your .env file.');
        }

        $apiKey = $this->apiKey;

        // Attach API key to each request as a query param
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        $stack->push(Middleware::mapRequest(function (RequestInterface $request) use ($apiKey) {
            return $request->withUri(Uri::withQueryValue($request->getUri(), 'api_key', $apiKey));
        }));

        // Set Guzzle client defaults
        $this->httpClient = new GuzzleClient([
            'http_errors' => false,
            'base_uri' => $this->baseUri ?: 'https://emailoctopus.com/api/1.6/',
            'timeout'  => $this->timeout ?: 30,
            'connect_timeout'  => $this->connectTimeout ?: 3,
            'handler' => $stack
        ]);

        return new Client($this->httpClient);
    }
}
