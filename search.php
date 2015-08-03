<?php

require 'vendor/autoload.php';

$client = new Elasticsearch\Client();


$params = array();
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-001';
$result = $client->get($params);
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['match']['age'] = 15;
$result = $client->search($params);
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['body']['query']['bool']['must'][]['match']['pokemon.psyduck.type'] = 'water';
$result = $client->search($params);
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(10, 15);
var_dump($result);



$params = array();
$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['range']['age']['gte'] = 11;
$params['body']['query']['filtered']['filter']['range']['age']['lte'] = 20;
$result = $client->search($params);
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['and'][]['term']['age'] = 10;
$params['body']['query']['filtered']['filter']['and'][]['term']['badges'] = 8;
$result = $client->search($params);
var_dump($result);


$params = array();
$params['body']['query']['filtered']['filter']['or'][]['term']['age'] = 10;
$params['body']['query']['filtered']['filter']['or'][]['term']['badges'] = 8;
var_dump($result);


$params = array();
$params['body']['query']['filtered']['filter']['and'][]['term']['age'] = 10;
$params['body']['query']['filtered']['filter']['and'][]['term']['badges'] = 8;
$params['size'] = 1;
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type']  = 'pokemon_trainer';
 
$params['size'] = 10;
$params['from'] = 10; // <-- will return second page
var_dump($result);


$params = array();
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-001';
$result = $client->get($params);
