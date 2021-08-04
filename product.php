<?php

 require_once 'db_pdo.php';

class Product
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

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
        $pageData['content'] = '<div class="container">
        <div class="row"><div class="container-fluid col-lg-4 p-2 m-2">';
        $pageData['content'] .= '<form acton="index.php?op=100" method="POST" class="">';
        $pageData['content'] .= '<div class="col-sm-8 form-group"><input type="text" name="Product" id="txtproductId" class="m-1 form-control form-control-md"></div>';
        $pageData['content'] .= '<div class="col-sm-3 form-group"><input type="submit" value="search" class="m-3"></div>';
        $pageData['content'] .= '</form></div>';
        $pageData['content'] .= '<div class="container-fluid col-lg-4 p-2 m-2"><div class="form-group">
        <a href="index.php?op=103" class="add" >Add new product</a>
    </div></div></div></div>';
        $pageData['content'] .= table_Display($products_table);
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function Display()
    {
    }

    public function AddorEdit($previous_data = [], $message = '')
    {
        $pageData['title'] = 'add New product';
        $pageData['description'] = 'add new product.!!';

        $pageData['content'] = <<<HTML
        <section class="gradient-custom">
            <div class="container py-3">
                <div class="row  align-items-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h2 class=" pb-2 pb-md-0">Add/Edit New Product</h2>
                                <hr class="new5">
                                <form action="index.php?op=111" method="POST" value="registration_form" class="form-inline" name="reg_form">
                                <input type="hidden" name="op" value="111" >
                                    <div class="row">
                                    <h4 class="mb-4 pb-2 pb-md-0 mb-md-3">Add/edit Product</h4>
                                    <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="productCode">productCode</label>
                                                <input type="text" name="productCode" id="txtproductCodeid" class="form-control form-control-lg"  value="" placeholder="productCode" maxlength="15" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="Name">Product Name</label>
                                                <input type="text" name="productname" id="txtnameProductid" class="form-control form-control-lg"  value="" placeholder="PrdouctName" maxlength="70" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="product">productLine</label>
                                                <input type="text" name="productLine" id="txtproductLineid" class="form-control form-control-lg"  value="" placeholder="productLine" maxlength="50" required/>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="productScale">productScale</label>
                                                <input type="text" id="productScaleid" class="form-control form-control-lg" name="productScale"  value=""  maxlength="10"  />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="productVendor">productVendor</label>
                                            <input type="text" id="productVendorid" class="form-control form-control-lg" name="productVendor"  value=""  maxlength="50"  />

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="City">productDescription</label>

                                            <input type="text" id="productDescriptionid" class="form-control form-control-lg" name="productDescription"  value=""  maxlength="50"  />

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="quantityInStock">quantityInStock</label>
                                                <input type="text" name="quantityInStock" maxlength="7" id="quantityInStockid" class="form-control form-control-lg" value="" placeholder="quantityInStock"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="buyPrice">buyPrice</label>
                                                <input type="text" name="buyPrice" maxlength="7" id="buyPriceid" class="form-control form-control-lg" value="" placeholder="buyPrice"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="MSRP">MSRP</label>
                                                <input type="text" name="MSRP" maxlength="7" id="MSRPid" class="form-control form-control-lg" value="" placeholder="MSRP"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <button  type="submit" name="save" class="btn btn btn-primary btn-lg" data-mdb-ripple-color="blue" value="Save" >Save</button>
                                            <button  type="submit" name="Cancel" class="btn btn btn-primary btn-lg" data-mdb-ripple-color="blue" value="Cancel" onClick="window.history.back();" >Cancel</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
HTML;
        $pageData['title'] = 'Register As New User';
        $pageData['description'] = 'Create a account to shop track your order and etc..!!';
        $pageData['message'] = $message;
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function Verify_AddEdit()
    {
        echo 'hello';
        $errormsg = '';
        // CIN('productCode', 15);
        // CIN('productname', 70);
        // CIN('productLine', 50);
        // CIN('productScale', 10);
        // CIN('productVendor', 50);
        // CIN('productDescription', 1000);
        // CIN('quantityInStock', 20);
        // CIN('buyPrice', 7);
        // CIN('MSRP', 7);

        $DB = new db_pdo();
        echo 'hello';
        $sql_query = $DB->queryInsert('INSERT INTO products (productCode, productName,productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice,MSRP) VALUES
       ('.$_POST['productCode'].','.$_POST['productname'].','.$_POST['productLine'].','.$_POST['productScale'].','.$_POST['productVendor'].','.$_POST['productDescription'].','.$_POST['quantityInStock'].','.$_POST['buyPrice'].','.$_POST['MSRP'].')');
        print_r($sql_query);
    }

    public function Delete()
    {
    }

    public function Save()
    {
    }

    public function Products_List()
    {
    }

    public function Products_Catalogue()
    {
    }
}
