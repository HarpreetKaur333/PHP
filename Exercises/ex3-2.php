<?php

const HOME = 'Welcome';
const PRODUCT = 'Product Catalogue';
const ABOUT = 'About Us';
const IDEA = 'Gift Ideas';

// the selected item
$selected = ABOUT;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Exercice 3-2 variable attribut</title>
    <style>
        #navigation ul {
            width: 150px;
        }

        .menu-item {
            background-color: #e1f4f3;
            color: #0000cc;
        }

        .selected {
            background-color: #fea799;
        }
    </style>
</head>

<body>
    <h1>Display active item in menu</h1>
    <nav id="navigation">

        <ul>
            <li class="menu-item"><?php echo HOME; ?>
            </li>
            <li class="menu-item"><?php echo PRODUCT; ?>
            </li>
            <li class="selected"><?php echo $selected; ?>
            </li>
            <li class="menu-item"><?php echo IDEA; ?>
            </li>
        </ul>
    </nav>
</body>

</html>