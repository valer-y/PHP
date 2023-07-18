<?php

require_once "../vendor/autoload.php";

$url = 'https://jsonplaceholder.typicode.com/users';

//$resource = curl_init($url);
//curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
//$result = curl_exec($resource);
//$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
//var_dump($code);
//echo $result;
//curl_close();

/**/

$user = [
	'name' => 'John Doe',
	'username' => 'john',
	'email' => 'mail@example.com'
];

$resource = curl_init();
curl_setopt_array($resource, [
	CURLOPT_URL => $url,
	CURLOPT_POST => true,
	CURLOPT_HTTPHEADER => ['content-type: application/json'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS => json_encode($user)
]);
$result = curl_exec($resource);
curl_close($resource);
echo $result;
