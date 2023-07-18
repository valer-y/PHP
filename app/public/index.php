<?php

require_once "../vendor/autoload.php";

$test = new \App\Test();
$test->getInfo();

/* func */
$string = "";
echo isset($string);
echo gettype($string);

/* String */
$string = "test string";
echo is_string($string);
echo strlen($string);
echo str_word_count($string);
echo str_replace($string, 't', 'o');
echo substr($string, 0, 5);
echo strpos($string, 'test');
echo stripos($string, 'test'); //case insensetive;
echo nl2br($string);
echo htmlentities($string); //uses nl2br(htmlentities($string));

/* const */
/* built in constants uses inside functions such as array_multisort() etc. */
echo SORT_ASC;
echo PHP_INT_MAX;
echo 'etc...';

/* numbers */
$num = 4000.00;

echo intval($string);
echo floor($num);
echo ceil($num);
echo round($num);

/* number formating */
echo number_format($num, 2, ".",' ');

/* array */

$array = [0 => 'Ban', 1 => 'ana'];
$array1 = [2 => 'La', 3 => 'va'];

echo is_array($array1);
var_dump(explode($string, ','));
echo implode('', $array);
echo in_array('no', $array);
echo array_search('no', $array );
var_dump( array_merge($array) );
var_dump( [...$array, ...$array1] );
var_dump( array_unique($array) );

/* array sorting */
$pers = [
	'name' => 'John',
	'surname' => 'Doe',
	'age' => 30,
];

var_dump( sort($array1) ); //rsort();
echo $pers['name']; // unreachable key - warning
echo $pers['name'] ??= 'unknown'; // null coalese assignment
print_r( array_keys($array1) ); // array_values

/* array func */

echo sum(...$array1);
echo array_reduce($array1, fn($carry, $n) => $carry . $n); // carry - result of previous iteration o 0-elem, n - nest elem

/* date */

echo date('Y-m-d H:i:s');
echo time(); // current timestamp
$date = date_parse('2000-01-01 09:00:00');

$date_str  ='2000-01-01 09:00:00';

$date = date_parse_from_format('F j Y H:s:i', $date_str);

/* file func */
rename('test1', 'test2');
rmdir('test2');
$content = file_get_contents('test.txt'); // could receive data by url
$json = json_decode($content, true);
file_put_contents('test.txt', "Some text");

$fies = scandir('./');
file_exists('test.txt');
is_dir('test');