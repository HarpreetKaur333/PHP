<?php

 require_once 'db_pdo.php';

// $products_array = [
//     [
//     'id' => 0,
//     'name' => 'Red Jersey',
//     'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
//     'price' => 59.99,
//     'pic' => 'red_jersey.jpg',
//     'qty_in_stock' => 200,
//     ],
//     [
//     'id' => 1,
//     'name' => 'White Jersey',
//     'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
//     'price' => 49.99,
//     'pic' => 'white_jersey.jpg',
//     'qty_in_stock' => 133,
//     ],
//     [
//     'id' => 2,
//     'name' => 'Black Jersey',
//     'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
//     'price' => 54.99,
//     'pic' => 'black_jersey.jpg',
//     'qty_in_stock' => 544,
//     ],
//     [
//     'id' => 3,
//     'name' => 'Blue Jacket',
//     'description' => 'Blue Jacket for cold and raniy weather',
//     'price' => 129.99,
//     'pic' => 'blue_jacket.jpg',
//     'qty_in_stock' => 14,
//     ],
//     [
//     'id' => 4,
//     'name' => 'Snapback Cap',
//     'description' => 'Manchester United New Era Snapback Cap- Adult',
//     'price' => 24.99,
//     'pic' => 'cap.jpg',
//     'qty_in_stock' => 655,
//     ],
//     [
//     'id' => 5,
//     'name' => 'Champion Flag',
//     'description' => 'Manchester United Champions League Flag',
//     'price' => 24.99,
//     'pic' => 'champion_league_flag.jpg',
//     'qty_in_stock' => 321,
//     ],
//     ];
class Product
{
    public function ListJSON()
    {
        $DB = new db_pdo();
        // $products = $DB->querySelect('SELECT * FROM products ORDER BY productLine ASC');
        $products = $DB->table('products', JSON_PRETTY_PRINT);
        $productsJson = json_encode($products);
        header('Content-Type: application/json');
        // header('Content-Type: application/json; charset=UTF-8');
        http_response_code(200);
        echo $productsJson;
    }

    public function List()
    {
        $DB = new db_pdo();
        $products_table = $DB->table('products');
        $pageData['title'] = 'List of all Products';
        $pageData['description'] = 'details list of all products';
        $PageData['content'] = table_Display($products_table);
        $webPage = new WebPage();
        $webPage->render($PageData);
    }

    public function Products_List()
    {
        global $products_array;
        $pageData['title'] = 'Register As New User';
        $pageData['description'] = 'Create a account to shop track your order and etc..!!';

        $pageData['content'] = '<table class="table table-striped table-hover">';
        $pageData['content'] .= '<thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>pic</th>
            <th>stock</th>
    </thead>
    <tbody>';
        foreach ($products_array as $p_list) {
            $pageData['content'] .= '<tr>';
            $pageData['content'] .= '<td>'.$p_list['id'].'</td>';
            $pageData['content'] .= '<td>'.$p_list['name'].'</td>';
            $pageData['content'] .= '<td>'.$p_list['description'].'</td>';
            $pageData['content'] .= '<td>'.$p_list['price'].'</td>';
            $pageData['content'] .= '<td>'.$p_list['pic'].'</td>';
            $pageData['content'] .= '<td>'.$p_list['qty_in_stock'].'</td>';
            $pageData['content'] .= '</tr>';
        }
        $pageData['content'] .= '</tbody>
</table>';
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function Products_Catalogue()
    {
        global $products_array;
        foreach ($products_array as $product_c) {
            echo '<div class="product">';
            echo '<img src="images/'.$product_c['pic'].'" />';
            echo '<div class="name">'.$product_c['name'].'</div>';
            echo '<div class="description ">'.$product_c['description'].'</div>';
            echo '<div class="price ">'.'$'.$produproduct_cct['price'].'</div>';
            echo '<div class="name">'.$product_c['qty_in_stock'].'</div>';
            echo '</div>';
        }
    }
}
