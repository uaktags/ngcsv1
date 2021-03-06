<?php

require 'vendor/autoload.php';

use NGCSv1\Adapter\HttpAdapter;
use NGCSv1\NGCSv1;

// create an adapter with your user's API Token
// found in your CloudPanel under "Users"
$adapter = new HttpAdapter('[SET ME!!!]');

// create a ngcs object with the previous adapter
$ngcs = new NGCSv1($adapter);

echo "Can we ping the API?: " . ($ngcs->Ping()->ping()== "[\"PONG\"]"? "Yes" : "No") . PHP_EOL;
echo "Is the API Key valid?: " . ($ngcs->Ping()->ping_auth()== "[\"PONG\"]" ? "Yes": "No") . PHP_EOL;
