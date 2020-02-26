<?php
include('../vendor/autoload.php');

$configuration = [
    'hostname' => 'https://kalendar.naturhouse-cz.cz/api/v2/',
    'auth_token' => 'sampletoken123',
];
$client = new \Naturhouse\Client($configuration);
// contact times

$contact = new \Naturhouse\Entities\Contact();
$contact->setFname('testovaci');
$contact->setLname('kontakt');
$contact->setBranch(3);
$contact->setPhone('+420777888995');
$contact->setEmail('testovaci5@kontakt.cz');


$id = $client->createContact($contact);
var_dump($id);
