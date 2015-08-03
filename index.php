<?php

require 'vendor/autoload.php';

$client = new Elasticsearch\Client();

$params = array();
$params['body']  = array(
    'name' => 'Ash Ketchum',
    'age' => 10,
    'badges' => 8 
);

$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';

$result = $client->index($params);
var_dump($result);


$params = array();
$params['body']  = array(
    'name' => 'Brock',
    'age' => 15,
    'badges' => 0 
);

$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['id'] = '1A-001';

$result = $client->index($params);
var_dump($result);


$params = array();
$params['body']  = array(
    'name' => 'Misty',
    'age' => 13,
    'badges' => 0,
    'pokemon' => array(
        'psyduck' => array(
            'type' => 'water',
            'moves' => array(
                'Water Gun' => array(
                    'pp' => 25,
                    'power' => 40
                )
            ) 
        )
    ) 
);

$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['id'] = '1A-002';

$result = $client->index($params);
var_dump($result);
