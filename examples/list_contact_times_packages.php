<?php
include('../vendor/autoload.php');

$configuration = [
    'hostname' => 'https://kalendar.naturhouse-cz.cz/api/v2/',
    'auth_token' => 'can be blank, but parameter is required',
];
$client = new \Naturhouse\Client($configuration);
// contact times
$ct = $client->getContactTimes();


echo "Contact times: \n";
foreach ($ct as $item) {
    echo $item->getId() . ' - ' . $item->getText() . "\n";
}


$packages = $client->getPackages();


echo "Packages: \n";
foreach ($packages as $item) {
    echo $item->getId() . ' - ' . $item->getName() . ': ' . $item->getFormattedPrice() . "\n";
}