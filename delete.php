<?php

require 'vendor/autoload.php';

$client = new Elasticsearch\Client();

$params = array();
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';
 
$result = $client->delete($params);
var_dump($result);
