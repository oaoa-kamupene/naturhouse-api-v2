<?php
include('../vendor/autoload.php');

$configuration = [
    'hostname' => 'https://kalendar.naturhouse-cz.cz/api/v2/',
    'auth_token' => 'dsfsdf',
];
$client = new \Naturhouse\Client($configuration);
// fetch list of all active branches
$branches = $client->getBranches();


foreach ($branches as $branch) {
    echo "branch: " . $branch->getId() . ' - ' . $branch->getName() . "\n";
}