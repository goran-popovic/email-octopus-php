# Email Octopus SDK for PHP

## PHP Version Support

- \>= 7.2.5

## Installation

You can install the package via composer:

```bash
composer require goran-popovic/email-octopus-php
```

## Getting Started

### API key
Before being able to use the SDK, you would need to create an 
<a href="https://help.emailoctopus.com/article/165-how-to-create-and-delete-api-keys" target="_blank">Email Octopus API key</a>.

### .env settings
After creating the key, you could edit any `.env` file 
you might be using and add your API key there, for example:

```text
EMAIL_OCTOPUS_API_KEY=YOUR_API_KEY
```

Then, you can interact with Email Octopus's API like so:

```php
$apiKey = getenv('EMAIL_OCTOPUS_API_KEY');

$client = EmailOctopus::client($apiKey);

$response = $client->lists()->createContact('00000000-0000-0000-0000-000000000000', [
    'email_address' => 'goran.popovic@geoligard.com', // required
    'fields' => [ // optional
        'FirstName' => 'Goran',
        'LastName' => 'Popović',
    ],
    'tags' => [ // optional
        'lead'
    ],
    'status' => 'SUBSCRIBED', // optional
]);

echo $response['status']; // SUBSCRIBED
```

If needed, there are additional options you can set when instantiating a `Client`:

```php
$client = EmailOctopus::client(
    $apiKey,
    'https://emailoctopus.com/api/1.6/', // API base URI, for most cases default is fine and there is no need to set this variable
    30, // timeout - maximum number of seconds to wait for a response
    3 // connect timeout - maximum number of seconds to wait while trying to connect to a server
);
```

## Usage

This wrapper tends to follow the logic and classification found in the official 
<a href="https://emailoctopus.com/api-documentation" target="_blank">Email Octopus API docs.</a>
All the routes, and available params for each route are explained in greater detail in those docs.

All the methods are assigned into 3 main resources:

- [Automation Resource](#automation-resource)
- [Campaign Resource](#campaign-resource)
- [List Resource](#list-resource)

### `Automation` Resource

You can find an ID of the automation you are currently viewing in the dashboard URL, 
like so: `https://emailoctopus.com/automations/<automationId>`

#### start(string $automationId, array $params)

```php
$client->automations()->start('00000000-0000-0000-0000-000000000000', [ 
    'list_member_id' => '00000000-0000-0000-0000-000000000000', 
]);
```

### `Campaign` Resource

You can find an ID of the campaign you are currently viewing in the dashboard URL,
like so: `https://emailoctopus.com/reports/campaign/<campaignId>`

#### get(string $campaignId)

```php
$client->campaigns()->get('00000000-0000-0000-0000-000000000000');
```

#### getAll(array $params = [])

```php
$client->campaigns()->getAll([
    'limit' => 1, // optional 
    'page' => 2 // optional 
]);
```

#### getReportSummary(string $campaignId)

```php
$client->campaigns()->getReportSummary('00000000-0000-0000-0000-000000000000');
```

#### getReportLinks(string $campaignId)

```php
$client->campaigns()->getReportLinks('00000000-0000-0000-0000-000000000000');
```

#### getReportBounced(string $campaignId, array $params)

```php
$client->campaigns()->getReportBounced('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportClicked(string $campaignId, array $params)

```php
$client->campaigns()->getReportClicked('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportComplained(string $campaignId, array $params)

```php
$client->campaigns()->getReportComplained('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportOpened(string $campaignId, array $params)

```php
$client->campaigns()->getReportOpened('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportSent(string $campaignId, array $params)

```php
$client->campaigns()->getReportSent('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportUnsubscribed(string $campaignId)

```php
$client->campaigns()->getReportUnsubscribed('00000000-0000-0000-0000-000000000000');
```

#### getReportNotClicked(string $campaignId, array $params)

```php
$client->campaigns()->getReportNotClicked('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

#### getReportNotOpened(string $campaignId, array $params)

```php
$client->campaigns()->getReportNotOpened('00000000-0000-0000-0000-000000000000', [
    'limit' => 1 // optional 
]);
```

### `List` Resource 

To find the list ID, go to your Email Octopus dashboard, find the `Lists` tab,
select a list by clicking on its title, and when you open a single list simply go to the `settings` tab
and copy the ID from there. Alternatively, you can find an ID of the list or any other resource
you are currently viewing in the dashboard URL, like so: `https://emailoctopus.com/lists/<listId>`

#### get(string $listId)

```php
$client->lists()->get('00000000-0000-0000-0000-000000000000');
```

#### getAll(array $params = [])

```php
$client->lists()->getAll([
    'limit' => 1, // optional
    'page' => 2 // optional
]);
```

#### create(array $params)

```php
$client->lists()->create([
    'name' => 'Api test'
]);
```

#### update(string $listId, array $params)

```php
$client->lists()->update('00000000-0000-0000-0000-000000000000', [
    'name' => 'New name'
]);
```

#### delete(string $listId)

```php
$client->lists()->delete('00000000-0000-0000-0000-000000000000');
```

#### getAllTags(string $listId)

```php
$client->lists()->getAllTags('00000000-0000-0000-0000-000000000000');
```

#### getContact(string $listId, string $memberId)

```php
$client->lists()->getContact(
    '00000000-0000-0000-0000-000000000000', 
    '00000000-0000-0000-0000-000000000000', 
);
```

#### getAllContacts(string $listId, array $params = [])

```php
$client->lists()->getAllContacts('00000000-0000-0000-0000-000000000000', [
    'limit' => 1, // optional
    'page' => 2 // optional
]);
```

#### getSubscribedContacts(string $listId, array $params = [])

```php
$client->lists()->getSubscribedContacts('00000000-0000-0000-0000-000000000000', [
    'limit' => 1, // optional
    'page' => 2 // optional
]);
```

#### getUnsubscribedContacts(string $listId, array $params = [])

```php
$client->lists()->getUnsubscribedContacts('00000000-0000-0000-0000-000000000000', [
    'limit' => 1, // optional
    'page' => 2 // optional
]);
```

#### getContactsByTag(string $listId, string $listTag, array $params = [])

```php
$client->lists()->getContactsByTag('00000000-0000-0000-0000-000000000000', 'lead', [
    'limit' => 1
]);
```

#### createContact(string $listId, array $params)

```php
$client->lists()->createContact('00000000-0000-0000-0000-000000000000', [
    'email_address' => 'goran.popovic@geoligard.com', // required
    'fields' => [ // optional
        'FirstName' => 'Goran',
        'LastName' => 'Popović',
    ],
    'tags' => [ // optional
        'lead'
    ],
    'status' => 'SUBSCRIBED', // optional
]);
```

#### updateContact(string $listId, string $memberId, array $params)

Note: For member ID you can either use the ID of the list contact that you can find in the URL in the dashboard: 
`https://emailoctopus.com/lists/<listId>/contacts/<contactId>`,
or an MD5 hash of the lowercase version of the list contact's email address.

```php
$client->lists()->updateContact('00000000-0000-0000-0000-000000000000', md5('goran.popovic@geoligard.com'), [
    'email_address' => 'new_email_address@geoligard.com', // optional
    'fields' => [ // optional
        'FirstName' => 'New name',
        'LastName' => 'New lastname',
    ],
    'tags' => [ // optional
        'vip' => true,
        'lead' => false
    ],
    'status' => 'UNSUBSCRIBED', // optional
]);
```

#### deleteContact(string $listId, string $memberId)

Note: For member ID you can either use the ID of the list contact that you can find in the URL in the dashboard:
`https://emailoctopus.com/lists/<listId>/contacts/<contactId>`,
or an MD5 hash of the lowercase version of the list contact's email address.

```php
$client->lists()->deleteContact(
    '00000000-0000-0000-0000-000000000000',
    md5('goran.popovic@geoligard.com')
);
```

#### createField(string $listId, array $params)

```php
$client->lists()->createField('00000000-0000-0000-0000-000000000000', [
    'label' => 'What is your hometown?',
    'tag' => 'Hometown',
    'type' => 'TEXT',
    'fallback' => 'Unknown' // optional
]);
```

#### updateField(string $listId, string $listFieldTag, array $params)

```php
$client->lists()->updateField('00000000-0000-0000-0000-000000000000', 'Hometown', [
    'label' => 'New label',
    'tag' => 'NewTag',
    'fallback' => 'New fallback' // optional
]);
```

#### deleteField(string $listId, string $listFieldTag)

```php
$client->lists()->deleteField('00000000-0000-0000-0000-000000000000', 'NewTag');
```

#### createTag(string $listId, array $params)

```php
$client->lists()->createTag('00000000-0000-0000-0000-000000000000', [
    'tag' => 'vip'
]);
```

#### updateTag(string $listId, string $listTag, array $params)

```php
$client->lists()->updateTag('00000000-0000-0000-0000-000000000000', 'vip', [
    'tag' => 'New Tag Name'
]);
```

#### deleteTag(string $listId, string $listTag)

```php
$client->lists()->deleteTag('00000000-0000-0000-0000-000000000000', 'New Tag Name');
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
