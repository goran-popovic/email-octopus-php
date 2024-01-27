<?php

declare(strict_types=1);

namespace GoranPopovic\EmailOctopus\Resources;

use GoranPopovic\EmailOctopus\Requests\Request;
use GuzzleHttp\Client;

final class Lists
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get details of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get
     *
     * @return array|mixed
     */
    public function get(string $listId)
    {
        $url = "lists/$listId";

        return Request::create($this->client, $url);
    }

    /**
     * Get details of all lists.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-all
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getAll(array $params = [])
    {
        $url = "lists";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Create a new list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/create
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function create(array $params)
    {
        $url = "lists";

        return Request::create($this->client, $url, $params, 'post', 'json');
    }

    /**
     * Update a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/update
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function update(string $listId, array $params)
    {
        $url = "lists/$listId";

        return Request::create($this->client, $url, $params, 'put');
    }

    /**
     * Delete a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/delete
     *
     * @return array|mixed
     */
    public function delete(string $listId)
    {
        $url = "lists/$listId";

        return Request::create($this->client, $url, [], 'delete');
    }

    /**
     * Get all tags on a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-all-tags
     *
     * @return array|mixed
     */
    public function getAllTags(string $listId)
    {
        $url = "lists/$listId/tags";

        return Request::create($this->client, $url);
    }

    /**
     * Get details of a contact of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-contact
     *
     * @return array|mixed
     */
    public function getContact(string $listId, string $memberId)
    {
        $url = "lists/$listId/contacts/$memberId";

        return Request::create($this->client, $url);
    }

    /**
     * Get details of all contacts of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-all-contacts
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getAllContacts(string $listId, array $params = [])
    {
        $url = "lists/$listId/contacts";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get details of all subscribed contacts of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-subscribed-contacts
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getSubscribedContacts(string $listId, array $params = [])
    {
        $url = "lists/$listId/contacts/subscribed";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get details of all unsubscribed contacts of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-unsubscribed-contacts
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getUnsubscribedContacts(string $listId, array $params = [])
    {
        $url = "lists/$listId/contacts/unsubscribed";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Get details of all contacts of a list with a given tag.
     *
     * @see https://emailoctopus.com/api-documentation/lists/get-tagged
     *
     * @param  array<string, int>  $params
     * @return array|mixed
     */
    public function getContactsByTag(string $listId, string $listTag, array $params = [])
    {
        $url = "lists/$listId/tags/$listTag/contacts";

        return Request::create($this->client, $url, $params);
    }

    /**
     * Create a contact of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/create-contact
     *
     * @param  array<string, string|array<string, mixed>>  $params
     * @return array|mixed
     */
    public function createContact(string $listId, array $params)
    {
        $url = "lists/$listId/contacts";

        return Request::create($this->client, $url, $params, 'post', 'json');
    }

    /**
     * Update a contact of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/update-contact
     *
     * @param  array<string, string|array<string, mixed>>  $params
     * @return array|mixed
     */
    public function updateContact(string $listId, string $memberId, array $params)
    {
        $url = "lists/$listId/contacts/$memberId";

        return Request::create($this->client, $url, $params, 'put');
    }

    /**
     * Delete a contact of a list.
     *
     * @see https://emailoctopus.com/api-documentation/lists/delete-contact
     *
     * @return array|mixed
     */
    public function deleteContact(string $listId, string $memberId)
    {
        $url = "lists/$listId/contacts/$memberId";

        return Request::create($this->client, $url, [], 'delete');
    }

    /**
     * Create list field
     *
     * @see https://emailoctopus.com/api-documentation/lists/create-field
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function createField(string $listId, array $params)
    {
        $url = "lists/$listId/fields";

        return Request::create($this->client, $url, $params, 'post', 'json');
    }

    /**
     * Update list field
     *
     * @see https://emailoctopus.com/api-documentation/lists/update-field
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function updateField(string $listId, string $listFieldTag, array $params)
    {
        $url = "lists/$listId/fields/$listFieldTag";

        return Request::create($this->client, $url, $params, 'put', 'json');
    }

    /**
     * Delete list field
     *
     * @see https://emailoctopus.com/api-documentation/lists/delete-field
     *
     * @return array|mixed
     */
    public function deleteField(string $listId, string $listFieldTag)
    {
        $url = "lists/$listId/fields/$listFieldTag";

        return Request::create($this->client, $url, [], 'delete');
    }

    /**
     * Create list tag
     *
     * @see https://emailoctopus.com/api-documentation/lists/create-tag
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function createTag(string $listId, array $params)
    {
        $url = "lists/$listId/tags";

        return Request::create($this->client, $url, $params, 'post', 'json');
    }

    /**
     * Update list tag
     *
     * @see https://emailoctopus.com/api-documentation/lists/update-tag
     *
     * @param  array<string, string>  $params
     * @return array|mixed
     */
    public function updateTag(string $listId, string $listTag, array $params)
    {
        $url = "lists/$listId/tags/$listTag";

        return Request::create($this->client, $url, $params, 'put', 'json');
    }

    /**
     * Delete list tag
     *
     * @see https://emailoctopus.com/api-documentation/lists/delete-tag
     *
     * @return array|mixed
     */
    public function deleteTag(string $listId, string $listTag)
    {
        $url = "lists/$listId/tags/$listTag";

        return Request::create($this->client, $url, [], 'delete');
    }
}
