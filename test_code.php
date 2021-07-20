<?php

// include 'phpTest.php';
// include 'phpconcepts.php';
// echo 'using include file can be included mutiple time and not show error if file not exist';

echo '<br>';
// echo 'Require';
// require 'phpTest.php';
// require 'phpconcepts.php';
// echo 'using require we include files many times but it show error if file is not exist';

// include_once 'phpTest.php';
// include_once 'phpconcepts.php';

// echo 'using include_once we can include same file many times but it show error if file is not found';
// require_once 'phpTest.php';
// require_once 'phpconcepts.php';

// echo 'using require once we include file mant time but it show error when file not found';
$array = ['green', 1 => 'hello', 'kaur', 12.0, '2' => 'ISI', 125];

foreach ($array as $key => $value) {
    echo $value;
}
echo '<br>';
$length = count($array);
for ($i = 0; $i < $length; ++$i) {
    echo $array[$i];
}

// echo 'differnece btw include, require, once';

// include 'phpconcepts.php';
// require 'phpconcepts.php';
// include_once 'phpconcepts.php';
// require_once 'phpconcepts.php';
for ($i = 5; $i <= 25; ++$i) {
    echo $i;
}
//QUiz
//push element at the end of array
$array[] = $value;
//use array push
 echo count($array); //get the number of elements in an array
