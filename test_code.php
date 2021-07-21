<!DOCTYPE html>

<head>
    <title>My website</title>
</head>

<body bgcolor="#99CC99">
    <?php
$fpath = "'D:\\PHP\\Count.txt'";
echo "Path : $fpath";

 $handle = fopen($fpath, 'r');
 if (!$handle) {
     echo 'could not open the file';
 } else {
     $counter = (int) fread($handle, 20);
     fclose($handle);
     ++$counter;
     echo ' <strong> you are visitor no '.$counter.' < /strong > ';
     $handle = fopen('counter.txt', 'w');
     fwrite($handle, $counter);
     fclose($handle);
 } ?>
    <h1>this is my website</h1>
</body>

</html>


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

//with require_once file must be exist otherwise it show error
// diferenece b/w include/require
//two way to define constant
// do for loop

echo 'for loop of exam';
for ($i = 10; $i < 5; ++$i) {
    echo $i;
}
echo '<br>';
echo '<br>';
//  function function_one($n)
//  {
//      return $n - 1;
//  }
// $array = [1, 2, 3, 4];
// $b = array_map(function_one, $array);
// echo $b;
echo '<br>';
$array = ['xcFTgreen', 'price' => 99.99, 'kaur', 12.0, 'ISI', 125];
echo '<br>';
for ($i = 0; $i < count($array); ++$i) {
    echo $array[$i];
    echo '<br>';
}
//here you get error because of offset 5
foreach ($array as $key => $value) {
    echo $value;
    echo '<br>';
}

echo '<br>';
$length = count($array);
for ($i = 0; $i < $length; ++$i) {
    echo $array[$i];
    echo '<br>';
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

 $title = 'Bank Of Canada';
// $description = "We are Canada's central bank";
// $tagline = "We are Canada's central bank. We work to preserve the value of money by keeping inflation low
// and stable.";
// $content = 'Governor Tiff Macklem talks about the
// importance of trade and exports to Canada’s economic recovery. He also talks about steps
// policy-makers and business can take to attract investment and improve
// competitiveness.';

// $policyCOntent = 'Eight times a year, the Bank announces its decision on the setting of its key
// policy interest rate.';
// if (!isset($content)) {
        //     Crash(500, 'web page content is not set in web page');
        // }
