<?php

require 'vendor/autoload.php';
$client = new MongoDB\Client(
  'mongodb+srv://sangnd:A2LCgZecgEmsRd2A@nhattan.7vquo.mongodb.net/myFirstDatabase?retryWrites=true&w=majority'
);

// Connec to the "data" database
$data = $client->data;
