<style>
    .logo_pic{
    width: 100px;
    height: 60px;
}

.company_name{
    color: white;
    font-size: revert;
 }
.product {
  width: 190px;
  height: 360px;
  overflow: auto;
  border: 1px solid black;
  text-align: center;
  display: inline-block;
  margin: 10px;
}

.product:hover {
  background-color: #c0c0c0;
}


.product img {
  width: 100%;
}

.product .name {
  font-size: 24px;
  margin: 0;
}

.product .description {
  margin: 0;
}

.product .price {
  font-size: 24px;
  color: red;
  font-weight: bold;
  margin: 0;
}
  body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
  }
  .header {
    padding: 80px;
    text-align: center;
    background: #1abc9c;
    color: white;
  }
  .header h3 {
    font-size: 40px;
  }
  h3{
    margin: 20px 20px 20px 20px;
  }
  table{
    margin: 20px 20px 20px 20px;
  }
  .navbar {
    overflow: hidden;
    background-color: #333;
    margin: 20px 20px 0px 20px;
  }
  .navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
  }
  .navbar a.right {
    float: right;
  }

  .navbar a:hover {
    background-color: #ddd;
    color: black;
  }
  .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
  }
  .side {
    -ms-flex: 30%; /* IE10 */
    flex: 30%;
    background-color: #f1f1f1;
    padding: 20px;
  }

  .footer {
    padding: 1px 0px 1px 10px;
    text-align: left;
    background: #000;
    color: #fff;
    margin: 20px 20px 20px 20px;
  }


</style>
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

class Product
{
    public function Products_List()
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

    public function Products_Catalogue()
    {
        global $products;
        foreach ($products as $product) {
            echo '<div class="product">';
            echo '<img src="images/'.$product['pic'].'"/>';
            echo '<div class="name">'.$product['name'].'</div>';
            echo '<div class="description ">'.$product['description'].'</div>';
            echo '<div class="price ">'.'$'.$product['price'].'</div>';
            echo '<div class="name">'.$product['qty_in_stock'].'</div>';
            echo '</div>';
        }
    }
}
?>

