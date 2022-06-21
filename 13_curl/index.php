<?php

use LDAP\Result;

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.
$resource = curl_init($url);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($resource);
// var_dump($resource);
echo $result;


// Get response status code
$info = curl_getinfo($resource);
$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
echo "<pre>";
var_dump($code);
echo "<pre>";


curl_close($resource);
// set_opt_array

// Post request 

$resource = curl_init();
$user = [
    'name' => 'Kevin',
    'email' => 'ronny@gmail.com',
    'job' => 'Dev',
];
curl_setopt_array(
    $resource,
    [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($user),
        CURLOPT_HTTPHEADER => ['content-type: application/json'],
    ]
);
$result = curl_exec($resource);
curl_close($resource);
echo $result;
