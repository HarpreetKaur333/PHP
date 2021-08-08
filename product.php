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
        $products = $DB->table('products', JSON_PRETTY_PRINT);
        $productsJson = json_encode($products);
        header('Content-Type: application/json');
        // header('Content-Type: application/json; charset=UTF-8');
        http_response_code(200);
        // echo $productsJson;
        $pageData['title'] = 'Product Json';
        $pageData['description'] = 'Product Json format';
        $pageData['content'] = '<h4>Product Data In JSON format</h4>';
        $pageData['content'] .= $productsJson;
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function List()
    {
        $DB = new db_pdo();
        // $products_table = $DB->table('products');

        $searchProductCode = isset($_POST['productCode']) ? $_POST['productCode'] : '';

        if (isset($_POST['ProductCode']) && !empty($_POST['ProductCode'])) {
            $searchProductCode = $_POST['ProductCode'];
            $products_table = $DB->querySelectParam('SELECT * FROM products where productCode=:productCode',
            ['productCode' => $searchProductCode]);
        } else {
            $products_table = $DB->querySelect('SELECT * FROM products');
        }
        $pageData['title'] = 'List of all Products';
        $pageData['description'] = 'details list of all products';
        $pageData['content'] = '<div class="col-md-12"><div class="col-md-5" style="float:left" >';
        $pageData['content'] .= '<form acton="index.php?op=100" method="POST">';
        $pageData['content'] .= '<div class="col-sm-8 form-group"><input type="text" name="ProductCode" id="txtproductId" class="m-1 form-control form-control-sm" placeholder="Search By Product Code"></div>';
        $pageData['content'] .= '<div class="col-sm-3 form-group"><input type="submit" value="search" class="btn btn-primary btn-sm mr-2" style="margin-left: 20px;"></div>';
        $pageData['content'] .= '</form></div>';
        //here form end
        $pageData['content'] .= '<div class="col-md-5"></div><div class="col-md-2" style="float:right"><div class="form-group">
        <a href="index.php?op=105" style="color: black;text-decoration: none;"><i class="fas fa-backward"></i><span style="margin-left: 10px;">Add Product</span></a>
    </div></div></div></div>';

        $pageData['content'] .= '<div class="table-responsive-lg col-lg-12 p-2 mb-5" style="height:19.0em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
        $pageData['content'] .= '<thead class="thead-light"><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity InStock</th><th>Buy Price</th><th>MSRP</th><th>Action</th></thead>';
        $pageData['content'] .= '<tbody>';
        foreach ($products_table as $each_table_row) {
            $pageData['content'] .= '<tr>';
            $pageData['content'] .= '<td>'.$each_table_row['productCode'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['productName'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['productLine'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['productScale'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['productVendor'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['productDescription'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['quantityInStock'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['buyPrice'].'</td>';
            $pageData['content'] .= '<td>'.$each_table_row['MSRP'].'</td>';
            $pageData['content'] .= '<td class="col-md-1"><span>
            <a href="index.php?op=102&productCode='.$each_table_row['productCode'].'" class="view"><i class="fas fa-eye m-1"></i></a>
            <a href="index.php?op=105&productCode='.$each_table_row['productCode'].'" class="edit"><i class="fas fa-edit m-1"></i></a>
            <a href="index.php?op=104&productCode='.$each_table_row['productCode'].'" class="delete"><i class="fa fa-trash m-1" ></i></a>
            </span></td>';
            $pageData['content'] .= '</tr>';
        }

        $pageData['content'] .= '</tbody>';
        $pageData['content'] .= '</table></div>';
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    /* Display details of 1 record */
    public function Display($message = '')
    {
        $DB = new db_pdo();
        $product_code = $_GET['productCode'];
        $products_table = $DB->querySelectParam('SELECT * FROM products where productCode=:productCode',
        ['productCode' => $_GET['productCode']]);
        if (count($products_table) === 0) {
            return 'table record is empty.';
        } else {
            $pageData['title'] = 'details of product and order detail table';
            $pageData['description'] = 'Details of parents and child table!!';
            $pageData['content'] = '<div class="col-lg-12 mt-2">
            <div class="container">
  <div class="row"><div class="col-lg-2"><a href="index.php?op=105" style="color: black;text-decoration: none;"><i class="fas fa-backward"></i><span style="margin-left: 10px;">Add Product</span></a></div>

            <div class="col-lg-8"></div>
            <div class="col-lg-2"><a href="index.php?op=100" style="color: black;text-decoration: none;"><span style="margin-right: 10px;">Edit/Delete</span><i class="fas fa-forward"></i></a></div></div>
            </div>
            <div class="col-lg-12"><fieldset class="mt-2">
            <legend>Product Code:- '.$product_code.'</legend>';
            $pageData['content'] .= '<div class="table-responsive-lg col-lg-12 p-2 mt-6" style="height:10.0em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
            $pageData['content'] .= '<thead class="thead-light"><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity InStock</th><th>Buy Price</th><th>MSRP</th><th>Action</th></thead>';
            $pageData['content'] .= '<tbody>';
            foreach ($products_table as $each_table_row) {
                $pageData['content'] .= '<tr>';
                $pageData['content'] .= '<td>'.$each_table_row['productCode'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['productName'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['productLine'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['productScale'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['productVendor'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['productDescription'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['quantityInStock'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['buyPrice'].'</td>';
                $pageData['content'] .= '<td>'.$each_table_row['MSRP'].'</td>';
                $pageData['content'] .= '<td class="col-md-1"><span>
                    <a href="index.php?op=105&productCode='.$each_table_row['productCode'].'" class="edit"><i class="fas fa-edit m-1"></i></a>
                    <a href="index.php?op=104&productCode='.$each_table_row['productCode'].'" class="delete"><i class="fa fa-trash m-1" ></i></a>
                    </span></td>';
                $pageData['content'] .= '</tr>';
            }
            $pageData['content'] .= '</tbody>';
            $pageData['content'] .= '</table></fieldset></div>';

            //here show orderdetails table data
            $orderdetails_table = $DB->querySelectParam('SELECT * FROM orderdetails where productCode=:productCode',
            ['productCode' => $_GET['productCode']]);
            if (count($orderdetails_table) === 0) {
                return 'no order is placed of this product code.'.$product_code;
            } else {
                $pageData['content'] .= '<div class="col-lg-12"><fieldset class="mt-2">
                <legend>Orders of this Product Code:- '.$product_code.'</legend><div class="table-responsive-lg col-lg-12 p-2 m-2" style="height:20.0em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
                $pageData['content'] .= '<thead class="thead-light"><th>Product Code</th><th>Order Number</th><th>Quantity Ordered</th><th>Price Each</th><th>Order Line Number</th></thead>';
                $pageData['content'] .= '<tbody>';
                foreach ($orderdetails_table as $orderdetails_each_row) {
                    $pageData['content'] .= '<tr>';
                    $pageData['content'] .= '<td>'.$orderdetails_each_row['productCode'].'</td>';
                    $pageData['content'] .= '<td>'.$orderdetails_each_row['orderNumber'].'</td>';
                    $pageData['content'] .= '<td>'.$orderdetails_each_row['quantityOrdered'].'</td>';
                    $pageData['content'] .= '<td>'.$orderdetails_each_row['priceEach'].'</td>';
                    $pageData['content'] .= '<td>'.$orderdetails_each_row['orderLineNumber'].'</td>';

                    $pageData['content'] .= '</tr>';
                }
                $pageData['content'] .= '</tbody>';
                $pageData['content'] .= '</table>/div></fieldset></div>';
                $webPage = new WebPage();
                $webPage->render($pageData);
            }
        }
    }

    public function Save($previous_data = [], $message = '')
    {
        $DB = new db_pdo();
        $product_code = isset($_GET['productCode']) ? $_GET['productCode'] : '';
        $op_Code = isset($_GET['op']) ? $_GET['op'] : '';

        if (isset($product_code) && !empty($product_code)) {
            $pageData['title'] = 'Edit Product';
            $pageData['description'] = 'Edit/Modify the product';
            $pageData['message'] = $message;
            $editProductInfo = $DB->querySelectParam('SELECT *  FROM products where productCode=:productCode', ['productCode' => $_GET['productCode']]);
        } else {
            $pageData['title'] = 'Add New Product';
            $pageData['description'] = 'Add New Product';
            $pageData['message'] = $message;
        }
        $edit_User_data = isset($editProductInfo) && !empty($editProductInfo);

        $productCode = $edit_User_data ? $editProductInfo[0]['productCode'] : '';
        $productName = $edit_User_data ? $editProductInfo[0]['productName'] : '';
        $productLine = $edit_User_data ? $editProductInfo[0]['productLine'] : '';
        $productScale = $edit_User_data ? $editProductInfo[0]['productScale'] : '';
        $productVendor = $edit_User_data ? $editProductInfo[0]['productVendor'] : '';
        $productDescription = $edit_User_data ? $editProductInfo[0]['productDescription'] : '';
        $quantityInStock = $edit_User_data ? $editProductInfo[0]['quantityInStock'] : '';
        $buyPrice = $edit_User_data ? $editProductInfo[0]['buyPrice'] : '';
        $MSRP = $edit_User_data ? $editProductInfo[0]['MSRP'] : '';

        $Form_url = $edit_User_data ? 'index.php?op=106&productCode='.$_GET['productCode'] : 'index.php?op=106';
        $pageData['content'] = <<<HTML
        <section class="gradient-custom">
            <div class="container py-3">
                <div class="row  align-items-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h2 class=" pb-2 pb-md-0">Add/Edit Product</h2>
                                <hr class="new5">
                                <form action="{$Form_url}" method="POST" value="product_form" class="form-inline" name="p_form">
                                <input type="hidden" name="op" value="{$op_Code}" >
                                <input type="hidden" name="hideproductcode" id="hiddenProductCode" value="{$product_code}" >
                                    <div class="row">
                                    <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="productCode">Product Code</label>
                                                <input type="text" name="productCode" id="txtproductCodeid" class="form-control form-control-lg"  value="{$productCode}" placeholder="productCode" maxlength="15" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="Name">Product Name</label>
                                                <input type="text" name="productname" id="txtnameProductid" class="form-control form-control-lg"  value="{$productName}" placeholder="prdouctName" maxlength="70" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="product">Product Line</label>
                                                <input type="text" name="productLine" id="txtproductLineid" class="form-control form-control-lg"  value="{$productLine}" placeholder="productLine" maxlength="50" required/>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="productScale">productScale</label>
                                                <input type="text" id="productScaleid" class="form-control form-control-lg" name="productScale"  placeholder="productScale"  value="{$productScale}"  maxlength="10" required  />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="productVendor">Product Vendor</label>
                                            <input type="text" id="productVendorid" class="form-control form-control-lg" name="productVendor" placeholder="productVendor"  value="{$productVendor}"  maxlength="50"  required/>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">

                                            <label class="form-label" for="City">Product Description</label>
                                             <!-- <input type="text" id="productDescriptionid" class="form-control form-control-lg" name="productDescription" placeholder="productVendor"  value=""  maxlength="1500"  required/> -->
                                            <textarea rows = "3" cols = "3" id="productDescriptionid" class="form-control form-control-lg" name="productDescription"
                                              maxlength="1500" >{$productDescription}
                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="quantityInStock">QuantityInStock</label>
                                                <input type="text" name="quantityInStock" maxlength="7" id="quantityInStockid" class="form-control form-control-lg"
                                                value="{$quantityInStock}" placeholder="quantityInStock"  onkeypress="return isNumberKey(event)" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="buyPrice">Buy Price</label>
                                                <input type="text" name="buyPrice" maxlength="7" id="buyPriceid" class="form-control form-control-lg" value="{$buyPrice}" placeholder="buyPrice" onkeypress="return isNumberKey(event)" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="MSRP">MSRP</label>
                                                <input type="text" name="MSRP" maxlength="7" id="MSRPid" class="form-control form-control-lg" value="{$MSRP}" placeholder="MSRP" onkeypress="return isNumberKey(event)" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <button  type="submit" name="save" class="btn btn-primary btn-sm" data-mdb-ripple-color="blue" value="save" id="btnsave" >Save</button>
                                            <a href="index.php?op=100"><button  type="button" name="Cancel" class="btn btn-primary btn-sm" data-mdb-ripple-color="blue" value="Cancel" >Cancel</button></a>
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

        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function verify_Save($message = '')
    {
        echo 'inside verifysave';
        $DB = new db_pdo();

        $editProductCode = isset($_GET['productCode']) ? $_GET['productCode'] : ''; //product code get from url

        $productCode = $productname = $productLine = $productScale = $productVendor = $productDescription = $quantityInStock = $buyPrice = $MSRP = '';

        $productCode = trim(isset($_POST['productCode']) ? $_POST['productCode'] : ''); //in insert mode
        $productname = check_htmlentities(trim(isset($_POST['productname']) ? $_POST['productname'] : ''));
        $productLine = check_htmlentities(trim(isset($_POST['productLine']) ? $_POST['productLine'] : ''));
        $productScale = check_htmlentities(trim(isset($_POST['productScale']) ? $_POST['productScale'] : ''));
        $productVendor = check_htmlentities(trim(isset($_POST['productVendor']) ? $_POST['productVendor'] : ''));
        $productDescription = check_htmlentities(trim(isset($_POST['productDescription']) ? $_POST['productDescription'] : ''));
        $quantityInStock = trim(isset($_POST['quantityInStock']) ? $_POST['quantityInStock'] : '');
        $buyPrice = (trim(isset($_POST['buyPrice']) ? $_POST['buyPrice'] : ''));
        $MSRP = trim(isset($_POST['MSRP']) ? $_POST['MSRP'] : '');

        var_dump($productLine, $productDescription, $productname, $productScale, $productVendor, $productCode);
        CIN('productCode', 15);
        CIN('productname', 70);
        CIN('productLine', 50);
        CIN('productScale', 10);
        CIN('productVendor', 50);
        CIN('productDescription', 1500);
        CIN('quantityInStock', 20);
        CIN('buyPrice', 20);
        CIN('MSRP', 20);
        // if (isset($_POST['save'])) {
        if (!empty($_POST['hideproductcode'])) {
            $query = "UPDATE products set productCode='$editProductCode',productname ='$productname',productLine='$productLine',productScale='$productScale',productVendor='$productVendor', productDescription='$productDescription',quantityInStock=$quantityInStock,buyPrice=$buyPrice,MSRP=$MSRP where productCode='".$editProductCode."'";
            var_dump($query);

            $message = 'Products successful edited.';
            header('Location: index.php?op=100');
        } else {
            $query = "INSERT INTO products (productCode, productName,productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice,MSRP)
            VALUES('$productCode','$productname','$productLine', '$productScale','$productVendor','$productDescription',$quantityInStock,$buyPrice,$MSRP)";

            var_dump($_POST);
            var_dump($query);
            print_r($query);
            $message = 'Products successful Added.';

            header('Location: index.php?op=105');
        }
        $sql_query = $DB->queryInsert($query);
        // }
        $pageData['title'] = 'Product';
        $pageData['description'] = 'Product Table Operation';
        $pageData['content'] = 'Product Table';
        $pageData['message'] = $message;
    }

    public function Delete($message = '')
    {
        $DB = new db_pdo();
        $productCode = $_GET['productCode'];
        if (isset($productCode) and $productCode != '') {
            $deleteorderdetail = $DB->queryParam('Delete FROM orderdetails where productCode=:productCode',
            ['productCode' => $productCode]);
            // if ($deleteorderdetail == 0) {
            $queryDelete = $DB->queryParam('Delete FROM products where productCode=:productCode',
                ['productCode' => $productCode]);
            $message = 'Products successful deleted. ';
            // } else {
            //     $message = 'Products can not be deleted, becuase used in another table ';
            // }
            // redirect('Location: index.php?op=100', $message);
        }
        header('location:index.php?op=100');
        $pageData['title'] = 'Product Delete';
        $pageData['description'] = 'Product Table Operation';
        $pageData['content'] = 'Product Table';
        $pageData['message'] = $message;
    }
}
