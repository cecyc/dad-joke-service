#!/usr/bin/env php
<?php

require dirname(__FILE__).'/vendor/autoload.php';

echo "***dad joke PHP client example***";

$client = new DadJoke\DadJokeClient('localhost:50051', [
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

$joke = new DadJoke\DadJokeRequest();

list($res, $status) = $client->GetDadJoke($joke)->wait();

echo "\n";
echo $res->getJoke();
echo "\n";

