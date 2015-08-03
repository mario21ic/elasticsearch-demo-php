<?php

require 'vendor/autoload.php';

$client = new Elasticsearch\Client();


$params = array();
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-001';
$result = $client->get($params);
 
 
$result['_source']['age'] = 21; //update existing field with new value
 
//add new field
$result['_source']['pokemon'] = array(
  'Onix' => array(
    'type' => 'rock',
    'moves' => array(
      'Rock Slide' => array(
        'power' => 100,
        'pp' => 40
      ),
      'Earthquake' => array(
        'power' => 200,
        'pp' => 100
      )
    )
  )
);
 
$params['body']['doc'] = $result['_source'];
 
$result = $client->update($params);
var_dump($result);
