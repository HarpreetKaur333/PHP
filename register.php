<?php

    if (!isset($index_loaded)) {
        header('HTTP / 01 400 this page can not be accessed directly');
        exit('this page cannot accessed directly');
    }
 require_once 'db_pdo.php';

class register
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    /**
     * $previous_data is optional paramter contains data previously entered sunch that the user don't have to refill the whole form in the case of an error.
     * msg display meassages at top of screen., examples and errors message.
     */
    public function register($msg = '', $previous_data = [], $message = '')
    {
        //create dropdown for province
        $DB = new db_pdo();
        $provinces_list = $DB->table('provinces');

        $selected_province = '<select name="province" id="txtprovinceid" class="form-control form-control-lg">';
        foreach ($provinces_list  as $one_province) {
            $selected_province .= '<option value="'.$one_province['code'].'">'.$one_province['nom'].'</option>';
        }
        $selected_province .= '</select>';

        // $countries_list = $DB->table('countries');
        // $countries_drop_down = '<select name="country" id="txtCountryid" class="form-control form-control-lg">';
        // foreach ($countries_list  as $one_countries) {
        //     $countries_drop_down .= '<option value="'.$one_countries['code'].'">'.$one_countries['nom'].'</option>';
        // }
        // $countries_drop_down .= '</select>';

        //when form is displayed for first time set default values for everything
        if ($previous_data == []) {
            $previous_data = [
                'fullname' => '',
                'address' => '',
                'city' => '',
                'country' => '',
                'postalcode' => '',
                'province' => '',
                'language' => '',
                'other_lang' => '',
                'spam_ok' => '',
            ];
        }
        $pageData['title'] = 'Register As New User';
        $pageData['description'] = 'Create a account to shop track your order and etc..!!';

        $pageData['content'] = <<<HTML
        <section class="vh-100 gradient-custom">
            <div class="container py-3 h-100">
                <div class="row  align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                             <h5 style="color:red;margin-left:30px;"></h5> <!--$msg -->
                                <h2 class=" pb-2 pb-md-0">Register as a New User</h2>
                                <hr class="new5">
                                <form action="index.php?op=5" method="POST" value="registration_form" class="form-inline" enctype="multipart/form-data" name="reg_form">
                                <input type="hidden" name="op" value="5" >
                                    <div class="row">
                                    <h4 class="mb-4 pb-2 pb-md-0 mb-md-5">General Information</h4>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstName">First-Name And Last-Name</label>
                                                <input type="text" name="fullname" id="txtfullnameid" class="form-control form-control-lg"  value="" placeholder="FirstName and LastName" maxlength="50" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Address">Address Line</label>
                                                <input type="text" name="address" id="txtaddressid" class="form-control form-control-lg"  value="" placeholder="Address" maxlength="255" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="City">City(Optional)</label>
                                                <input type="text" id="City" class="form-control form-control-lg" name="city"  value=""  maxlength="50"  />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Province">Province(Optional)</label>
                                            {$selected_province}
                                                <!-- <select name="province" id="txtprovinceid" class="form-control form-control-lg">
                                                    <option value="0">select Option</option>
                                                    <option value="QC">Québec</option>
                                                    <option value="ON">Ontario</option>

                                                    </select> -->
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="City">Country(Optional)</label>

                                                <input type="text" id="txtCountryid" class="form-control form-control-lg"  value="" name="country" maxlength="50"  />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Postal">Postal Code(Optional)</label>
                                                <input type="text" name="postalcode" maxlength="7" id="txtPostald" class="form-control form-control-lg" value="" placeholder="eg. A1B-2C3"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Postal">Language</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">

                                                <input class="form-check-input" type="radio" name="language"  id="French" value="fn" checked
                                                />
                                                <label class="form-check-label" for="French">French</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input
                                                class="form-check-input" type="radio" name="language" id="English"
                                                value="en"
                                                />
                                                <label class="form-check-label" for="English">English</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                    <div class="form-check form-check-inline" style="display: flex;">
                                                        <input class="form-check-input" type="radio"
                                                        name="language" id="txtOtherid"
                                                        value="otherlang" name="other"
                                                        />
                                                        <label class="form-check-label" for="Other">Other</label>
                                                        <input type="text" id="OtherLanguage"  name="other_lang" class="form-control form-control-lg ms-3" maxlength="25" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Picture">Picture(optional)</label>
                                            <input type="file"  name="my_image" id="txtpictureld" class="form-control form-control-lg" value="" />
                                            <!-- <button type="submit"class="btn btn btn-primary btn-sm">Upload</button> -->
                                            </div>
                                        </div>
                                        <h4 class="mb-4 pb-2 pb-md-0 mb-md-5">Connection Information(required)</h4>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="email" name="email" id="txtEmailid" class="form-control form-control-lg" placeholder="Email"  maxlength="350" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="password" name="pw" id="Password" class="form-control form-control-lg" placeholder="Password-Must be 8 char"   maxlength="8" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="RepeatPassword" class="form-control form-control-lg" placeholder="Repeat password" name="pw2" maxlength="8" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input class="form-check-input"
                                                type="checkbox"  id="spam_ok_id"
                                                checkbox name="spam_ok" value="1" checked/>
                                                <label class="form-check-label text-black" for="form2Example3">
                                                I accept to periodically receive information about a new product</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <button  type="submit" name="Continue" class="btn btn btn-primary btn-lg" data-mdb-ripple-color="blue" value="Continue" >Continue</button>
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

    public function register_verify()
    {
        $errormsg = '';
        // if (isset($_POST['reg_form']) !== 'registration_form') {
        //     Crash(400, 'bad request for form');
        // }
        CIN('email', 350);
        CIN('fullname', 50);
        CIN('pw', 7);
        CIN('address', 255);
        CIN('city', 50);
        CIN('postalcode', 7);
        CIN('other_lang', 25);
        $DB = new db_pdo();
        if (isset($_POST['province'])) {
            $provinces_list = $DB->querySelect("SELECT * FROM provinces WHERE code='".$_POST['province']."'");
            if (count($provinces_list) === 0) {
                Crash(400, 'Invalid Province code in registration form');
            }
        }

        $email = $pw = $pw2 = $fullname = $address = $city = $postal_code = $customerNumber = $level = '';
        $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
        $pw = trim(isset($_POST['pw']) ? $_POST['pw'] : '');
        $pw2 = trim(isset($_POST['pw2']) ? $_POST['pw2'] : '');
        $fullname = htmlentities(trim(isset($_POST['fullname']) ? $_POST['fullname'] : ''));
        $address = trim(isset($_POST['address']) ? $_POST['address'] : '');
        $city = trim(isset($_POST['city']) ? $_POST['city'] : '');
        $selected_country = trim(isset($_POST['country']) ? $_POST['country'] : '');
        $postalcode = trim(isset($_POST['postalcode']) ? $_POST['postalcode'] : '');
        // $picture = isset($_POST['my_image']) ? $_POST['my_image'] : null;
        $customerNumber = trim(isset($_POST['customerNumber']) ? $_POST['customerNumber'] : 123);

        if (trim(isset($_Post['province']) and !empty($_POST['province']))) {
            $selected_province = $_POST['province'];
        } else {
            $selected_province = '';
        }
        // if (trim(isset($_Post['country']) and !empty($_POST['country']))) {
        //     $selected_country = $_POST['country'];
        // } else {
        //     $selected_country = 'CA';
        // }
        $insert_lang = '';
        if (trim(isset($_POST['language']))) {
            $radioVal = $_POST['language'];

            if ($radioVal == 'fr') {
                $insert_lang = 'fr';
            } elseif ($radioVal == 'en') {
                $insert_lang = 'en';
            }
        }

        if (isset($_POST['other'])) {
            $other_lang = $_Post['other_lang'];
        } else {
            $other_lang = '';
        }

        if (isset($_Post['spam_ok']) and (!empty($_POST['spam_ok']))) {
            $spam_ok = 1;
        } else {
            $spam_ok = 0;
        }

        if (!empty($_POST['level'])) {
            $level = 'client';
        } else {
            $level = 'admin';
        }

        if (isset($fullname)) {
            if (strlen($fullname) > 50) {
                Crash(500, 'Full Name is too long..!!');
            }
        } else {
            Crash(500, 'Please enter Fullname..!!');
        }
        if (isset($email)) {
            if (strlen($email) > 255) {
                Crash(500, 'Email length is too long..!!');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Crash(500, 'Invalid email format...!!');
            }
        } else {
            Crash(500, 'field name email is not found..!!');
        }
        if (isset($pw)) {
            if (strlen($pw) > 8) {
                Crash(500, 'field length is too long..!!');
            }
        } else {
            Crash(500, 'field Password is not set by user..!!');
        }

        $previous_data = $_POST; //save all previous data
        if (isset($errormsg)) {
            self::Register($errormsg, $previous_data);
        }

        // check if email already exist

        // var_dump($previous_data);
        $DB = new db_pdo();
        $get_email = $DB->querySelect("SELECT * FROM users WHERE email= '".$email);
        if ($get_email != null) {
            foreach ($get_email as $one_email) {
                if ($one_email['email'] === $email) {
                    // if(count($one_email)==1){
                    // Crash(500, 'This email already in use, please select a different email!!');
                    $errormsg .= 'This email already in use, please select a different email!!';
                }
            }
        }
        if ($pw != $pw2) {
            $errormsg .= 'The password and repeated password must be the same..!!';
        }
        /**
         * special case for checkbox.
         */
        $previous_data = $_POST;
        if (isset($_POST['spam_ok'])) {
            //if checkbox non check force value zero in input array
            $previous_data['spam_ok'] = 0;
        }
        if ($errormsg !== '') {
            //clear password to avoid transmitting password over the sever
            $previous_data['pw'] = '';
            $previous_data['pw2'] = '';
            $this->register($previous_data, $errormsg); //anamefter error msg refil form
        } else {
            if (isset($_FILES['my_image']['name'])) {
                $pic_name = basename($_FILES['my_image']['']);

                // echo $pic_name;
                $errormsg = Picture_Uploaded_Save_File('my_image', 'users_images/');
                if ($errormsg !== 'ok' and $errormsg !== 'error picture uploaded: code=4') {
                    $previous_data['pw'] = '';
                    $previous_data['pw2'] = '';
                    $this->register($previous_data, $errormsg);
                }
            } else {
                $pic_name = '';
            }
            $previous_data['fullname'] = htmlentities($previous_data['fullname']);
            // for avoid the html code inside adatbase
            $fullname = htmlentities($_POST['fullname']);
            echo 'inside query';
            $sql_query = $DB->queryInsert("INSERT INTO users (email, pw, level , fullname, address , city, province, country, postal_code, language , other_lang, spam_ok, picture, customerNumber) VALUES ('$email ',' $pw ',' $level ',' $fullname ',' $address ',' $city ','Q','C',' $postalcode ',' $insert_lang ',' $other_lang ', $spam_ok,  $pic_name ,$customerNumber)");
            var_dump($sql_query);
            print_r($sql_query);

            //here uploaded picture
            Picture_Uploaded_Save_File('picture', 'users_images/');
            $this->Logout;

            // $pageData['title'] = 'connected';
            // $pageData['content'] = '<h6>New User record created successfully.</h6> Welcome back '.$email.'.!!';

            // $webPage = new WebPage();
            // $webPage->render($pageData);
            // exit();
        }
    }

    public function Logout()
    {
        $_SESSION['email'] = null;
        $pageData['title'] = 'Logged Out';
        $pageData['content'] = '<h3>You are Logged out..!!!<h3>';

        $webPage = new WebPage();
        $webPage->render($pageData);
    }
}
