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
