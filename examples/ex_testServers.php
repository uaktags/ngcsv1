<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/5/2017
 * Time: 8:12 PM
 */
require '../vendor/autoload.php';

use NGCSv1\Adapter\HttpAdapter;
use NGCSv1\NGCSv1;

// create an adapter with your user's API Token
// found in your CloudPanel under "Users"
$adapter = new HttpAdapter('624ed6c8ccffba93ff2c2ea950a9b1e4');

// create a ngcs object with the previous adapter
$ngcs = new NGCSv1($adapter);
echo "<pre>";
print_r($ngcs->Server()->getAll());
echo "<pre>";