<?php

function Array_Display($array)
{
    echo '<table>';
    echo '<tr>
        <th style="border:1px solid black">index/key</th>
        <th style="border:1px solid black">value</th>
    </tr>';
    foreach ($array as $key => $value) {
        echo '<tr>
        <td style="border:1px solid black">'.$key.'</td>
        <td style="border:1px solid black">'.$value.'</td>
    </tr>';
    }
    echo '</table>';
}
function redirect($newURL)
{
    header('location:', $newURL);
}
function Crash($code, $msg)
{
    header('HTTP/01'.$code.''.$msg);
    exit($msg);
}
// function Number_of_Visitior()
// {
//     $handle = fopen('counter.txt', 'r');
//     if (!$handle) {
//         echo 'could not open the file';
//     } else {
//         $counter = (int) fread($handle, 20);
//         fclose($handle);
//         ++$counter;
//         echo $counter;
//         $handle = fopen('counter.txt', 'w');
//         fwrite($handle, $counter);
//         fclose($handle);
//     }
// }
