<?php

function showTitle($title)
{
    echo "<h2>&#9830; $title</h2>";
    echo '<hr/>';
}

$phrase = 'Hello my friends! How are you today?';

showTitle('Exercise 1: number of characters with strlen()'.'<br>'.strlen($phrase));

showTitle('Exercise 2: word count with str_word_count()'.'<br>'.str_word_count($phrase));

showTitle('Exercise 3: uppercase with strtoupper()'.'<br>'.strtoupper($phrase));

showTitle('Exercise 4: First character of each word capitalized with ucwords()'.'<br>'.ucwords($phrase));

showTitle('Exercise 5: one word per line with explode() et foreach');
$eachword = (explode(' ', $phrase));
foreach ($eachword as $word) {
    echo $word.'<br>';
}

showTitle('Exercise 6: reverse the array with array_reverse()');
$arrayfromstring = (explode(' ', $phrase)); //here first change string to array then use array_reverse function
// var_dump($arrayfromstring);              // because  array_reverse  function accept array not string
// print_r($arrayfromstring);
$reverse = array_reverse($arrayfromstring);
// $preserve = array_reverse($arrayfromstring, true);
foreach ($reverse as $reverseword) {
    echo $reverseword.'<br>';
}
// print_r($reverse);

showTitle('Exercise 7 character count without whitespaces');
$charwithoutspace = str_replace(' ', '', $phrase); //here first remove white space then count character
$character_count = strlen($charwithoutspace);
echo $character_count;

showTitle('Exercise 8 change a for b, c for d, e for f with strtr()');
$arr = ['a' => 'b', 'c' => 'd', 'e' => 'f'];  //here when array is passed as the parameter
echo strtr($phrase, $arr);
