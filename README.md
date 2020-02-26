# Naturhouse CRM sample PHP client library

This library is open source client library for Naturhouse CRM, mainly for support affiliate partners.

**Naturhouse public API supports**:
- get list of branches
- get list of packages provided for clients
- get list of contact times (possibilities when to call to created contact)
- create contact
- get created contact (to verify its state)


## Instalation

using composer:

```bash
$ composer require oaoa/naturhouse-api-v2
```

## Basic usage

The simplest scenario is:

1. fetch list of active branches
2. create contact
3. check contact state

```php
$configuration = [
'hostname' => 'https://kalendar.naturhouse-cz.cz/api/v2/',
'auth_token' => 'seecret token; you can get one from Naturhouse',
];
$client = new \Naturhouse\Client($configuration);
// fetch list of all active branches
$branches = $client->getBranches();
// prepare contact data
$contact = new \Naturhouse\Entities\Contact();
$contact->setFname('krestni');
$contact->setLname('prijmeni');
$contact->setBranch($branches[0]->getId());
$contact->setNote('testovaci kontakt');
// create contact
try{
    $response = $client->createContact($contact);
    $contactId = $response->getId();
    //fetch contact state
    $fetchedContact = $client->getContact($contactId);
    // print contact state
    var_dump($fetchedContact->getStatus());   
} catch(\Naturhouse\Exceptions\ClientException $e) {
    echo $e->getMessage();
}
```

### notes
Be careful, branches can change in > 10 minutes, so do NOT cache them longer than day. If you create contact 
to inactive branch, API will respond with error. 