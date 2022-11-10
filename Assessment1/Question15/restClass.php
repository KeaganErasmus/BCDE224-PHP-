<?php
// var_dump($_SERVER);
$query = $_SERVER['QUERY_STRING'];
$query = trim($query);
$data = array('cats' => 'evil', 'dogs' => 'dumb', 'birds' => 'flighty');
$answer = in_array($query, $data);'unknown';
// $answer = $data[ $query ];
// echo "ho";
// echo "$query<br>";

// $s = isset($query);
// $e = empty($query);
// $n = is_null($query);
// $t = gettype($query);
// echo "s $s  e $e n $n t $t<br>";

// $answer = 'unknown';
if (! empty($query) )
{
	/*
	echo 'not empty<br>';
	$i = in_array($query, $data);
	echo "$i<br>";
	var_dump($i);
	var_dump($data);
	print_r($data);
	$answer = $data[ $query ];
	echo "a=$answer<br>";
	*/
	if (array_key_exists($query, $data))
	{
		//echo 'in array<br>';
		//$answer = 'got it';
		$answer = $data[ $query ];
	}
}



header('Content-Type: application/json');
echo json_encode(['input'=>$query,'output'=>$answer]);
