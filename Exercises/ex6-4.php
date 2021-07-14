<?php

function Array_Display($array)
{
    echo '<table>';
    echo '<tr><th style="border:1px solid black">index/key</th><th style="border:1px solid black">value</th></tr>';
    foreach ($array as $key => $value) {
        echo '<tr><td style="border:1px solid black">'.$key.'</td><td style="border:1px solid black">'.$value.'</td></tr>';
    }
    echo '</table>';
}

function showTitle($title)
{
    echo "<br/><b>&#9830; $title</b><br/>";
    echo '<hr/>';
}

$colors = [
    'rouge',
    'bleu',
    'noir',
    'vert',
    'gris',
];

showTitle('Exercice 1 - Sort in ascending order');
sort($colors);
Array_Display($colors);

showTitle('Exercice 2 - All uppercase using array_walk or array_map');
$upper_colors = array_map('strtoupper', $colors);
// var_dump($upper_colors);
Array_Display($upper_colors);
// print_r($upper_colors);

showTitle('Exercice 3 - Merge $colors and $otherColors with array_merge()');

$otherColors = [
    'vert',
    'bleu',
    'noir',
];
Array_Display(array_merge($colors, $otherColors));
