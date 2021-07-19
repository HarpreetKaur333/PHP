<?php

$products = [
[
'id' => 0,
'name' => 'Red Jersey',
'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
'price' => 59.99,
'pic' => 'red_jersey.jpg',
'qty_in_stock' => 200,
],
[
'id' => 1,
'name' => 'White Jersey',
'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
'price' => 49.99,
'pic' => 'white_jersey.jpg',
'qty_in_stock' => 133,
],
[
'id' => 2,
'name' => 'Black Jersey',
'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
'price' => 54.99,
'pic' => 'black_jersey.jpg',
'qty_in_stock' => 544,
],
[
'id' => 3,
'name' => 'Blue Jacket',
'description' => 'Blue Jacket for cold and raniy weather',
'price' => 129.99,
'pic' => 'blue_jacket.jpg',
'qty_in_stock' => 14,
],
[
'id' => 4,
'name' => 'Snapback Cap',
'description' => 'Manchester United New Era Snapback Cap- Adult',
'price' => 24.99,
'pic' => 'cap.jpg',
'qty_in_stock' => 655,
],
[
'id' => 5,
'name' => 'Champion Flag',
'description' => 'Manchester United Champions League Flag',
'price' => 24.99,
'pic' => 'champion_league_flag.jpg',
'qty_in_stock' => 321,
],
];
function Products_List()
{
    global $products;
    echo '<table border="1">';
    echo '<thead><tr><th>id</th><th>name</th><th>description</th><th>price</th><th>pic</th><th>stock</th></thead><tbody>';
    foreach ($products as $p_list) {
        echo '<tr>';
        echo '<td>'.$p_list['id'].'</td>';
        echo '<td>'.$p_list['name'].'</td>';
        echo '<td>'.$p_list['description'].'</td>';
        echo '<td>'.$p_list['price'].'</td>';
        echo '<td>'.$p_list['pic'].'</td>';
        echo '<td>'.$p_list['qty_in_stock'].'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

function Products_Catalogue()
{
    global $products;
    foreach ($products as $product) {
        echo '<div class="product">';
        echo '<img src="products_images/'.$product['pic'].'"/>';
        echo '<div class="name">'.$product['name'].'</div>';
        echo '<div class="description ">'.$product['description'].'</div>';
        echo '<div class="price ">'.$product['price'].'</div>';
        echo '<div class="name">'.$product['qty_in_stock'].'</div>';
        echo '</div>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ElectricScooter.com</title>
    <link rel="stylesheet" href="CSS_of_ex6-6.css" />
</head>

<body>
    <div class="navbar">
        <a href="#">
            <img src="products_images/elctric_scooter_logo.png" alt="logoImage" class="logo_pic">
        </a>
        <h1 class="company_name">ElectricScooter.com</h1>
    </div>
    <h3>Product List-Electric Scooter Inc.</h3>
    <?php echo Products_List(); ?>
    <?php if (isset($_GET['op'])) { ?>
    <?php
    // $op = $_GET['op'];
    // switch ($op) {
    //     case 110:
    //         Products_List();
    //         break;
    //     case 111:
    //         Products_Catalogue();
    //         break;
    // }
    ?>
    <?php } ?>
    <div class="footer">
        <h2>This is the footer</h2>
    </div>
</body>

</html>