<?php

// if (!isset($index_loaded)) {
//     header('HTTP / 01 400 this page can not be accessed directly');
//     exit('this page cannot accessed directly');
// }
 require_once 'db_pdo.php';
class Users
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function Login($msg = '')
    {
        if (isset($_SESSION['login_count']) and $_SESSION['login_count'] > 3) {
            Crash('403', 'You are Blocked, try again..!!');
        }
        $pageData['title'] = 'Login Users';
        $pageData['description'] = 'Login Users details';
        if (isset($_COOKIE['email'])) {
            // echo "Cookie named '".$_COOKIE['email']."' is not set!";
            $pageData['content'] = 'Welcome Back: '.$_COOKIE['email'];
            $pageData['content'] .= 'last Visited on: '.date('d-m-y', $_COOKIE['last_login_time']);
        } else {
            $pageData['content'] = 'this is your first visit';
            // echo "Cookie '".$_COOKIE['email']."' is set!<br>";
            // echo 'Value is: '.$_COOKIE[$cookie_name];
        }
        $pageData['content'] .= <<<HTML
        <div class="containter">
            <div class="row">
                <div class="col-xs-12"
            <h3 class="text-left">Login Page Of Users</h3>
            <h5 style="color:red;margin-left:30px;">$msg</h5>
            <!-- <form action="index.php" method="GET"> -->
            <form action="index.php?op=2" method="POST" class="form-inline">
            <input type="hidden" name="op" value="2">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  name='email'  maxlength='255' required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="pw" maxlength="10" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"  value="Continue">Submit</button>
                    </div>
              </div>
                </form>

            </div>
    </div>
HTML;

        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function Login_Verify()
    {
        //use hard code for users
        // $Users = [
        //     ['id' => 0, 'email' => 'Yannick@gmail.com', 'pw' => '12345678'],
        //     ['id' => 1, 'email' => 'Victor@test.com', 'pw' => '11111111'],
        //     ['id' => 2, 'email' => 'Christian@victoire.ca', 'pw' => '22222222'],
        //    ['id' => 3, 'email' => 'hk@gmail.com', 'pw' => '123'],
        // ]; <!-- //$prev_data['email'] -->

        $DB = new db_pdo(); //connect to db
        // $users = $DB->table('users');
        // var_dump($users);

        // $one_users = $DB->querySelect("SELECT * FROM users where level='admin'");
        // var_dump($one_users);

        // var_dump($_POST);
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if (strlen($email) > 255) {
                Crash(500, 'Email length is too long..!!');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errormsg = 'invalid email format..!!';
            }
        } else {
            Crash(500, 'field name email is not found..!!');
        }

        if (isset($_POST['pw'])) {
            $pw = $_POST['pw'];
            if (strlen($pw) > 8) {
                Crash(500, 'field length is too long..!!');
            }
        } else {
            Crash(500, 'field Password is not set by user..!!');
        }
        if (isset($errormsg)) {
            self::Login($errormsg);
        }
        // $users = $DB->querySelect("SELECT * FROM users WHERE email='".$email."'AND pw='".$pw."'");
        $users = $DB->querySelect("SELECT * FROM users WHERE email='".$email."'");
        if (count($users) != 0 && $users != null) {
            if (password_verify($pw, $users[0]['pw'])) {
                $_SESSION['email'] = $email;

                //         // set cookies
            setcookie('email', $email, time() + 7776000); //set cookies for three months
            setcookie('last_login_time', time(), time() + 7776000);
                $pageData['title'] = 'connected';
                $pageData['content'] = '<h3>You are connected</h3> Welcome back '.$email.'.!!';

                $webPage = new WebPage();
                $webPage->render($pageData);
                exit();
            }
        }
        // foreach ($Users as $one_users) {
        //     if ($one_users['email'] === $email and $one_users['pw'] === $pw) {
        //         $_SESSION['email'] = $email;

        //         // set cookies
        //         setcookie('email', $email, time() + 7776000); //set cookies for three months
        //         setcookie('last_login_time', time(), time() + 7776000);
        //         $pageData['title'] = 'connected';
        //         $pageData['content'] = '<h3>You are connected</h3> Welcome back '.$email.'.!!';

        //         $webPage = new WebPage();
        //         $webPage->render($pageData);
        //         exit();
        //     }
        // }
        //here use superglobal function
        // $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        // if ($lang == 'en') {
        //     // echo 'Hello World';
        //     $pageData['title'] = 'connected';
        //     $pageData['content'] = '<h3>You are connected</h3>Select Language  '.$email.'.!!';
        // } elseif ($lang == 'fr') {
        //     // echo 'Bonjour le monde';
        //     $pageData['title'] = 'connected';
        //     $pageData['content'] = '<h3>You are connected</h3>Select Language  '.$email.'.!!';
        // } else {
        //     // echo 'Select language: English or French';
        //     $pageData['title'] = 'connected';
        //     $pageData['content'] = '<h3>You are connected</h3> Select Language '.$email.'.!!';
        // }

        if (isset($_SESSION['login_count'])) {
            $_SESSION['login_count'] = 1;
        } else {
            ++$_SESSION['login_count'];
            if ($_SESSION['login_count'] > 3) {
                Crash('403', 'You are blocked, try again after some time..!!');
            }
        }
        self::Login('email and password is not found.please try again');
    }

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

        $countries_list = $DB->table('countries');
        $countries_drop_down = '<select name="country" id="txtCountryid" class="form-control form-control-lg">';
        foreach ($countries_list  as $one_countries) {
            $countries_drop_down .= '<option value="'.$one_countries['code'].'">'.$one_countries['nom'].'</option>';
        }
        $countries_drop_down .= '</select>';

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
        $DB = new db_pdo();
        // var_dump([$_GET['id']]);
        $id = isset($_GET['id']) ? $_GET['id'] : ''; //product code get from url

        $get_Users = $DB->querySelectParam('select * FROM Users where id=:id', ['id' => $id]);
        // var_dump($get_Users);
        $edit_id = $get_Users ? $get_Users[0]['id'] : '';
        $edit_email = $get_Users ? $get_Users[0]['email'] : '';
        $edit_level = $get_Users ? $get_Users[0]['pw'] : '';
        $edit_level = $get_Users ? $get_Users[0]['level'] : '';
        $edit_fullname = $get_Users ? $get_Users[0]['fullname'] : '';
        $edit_address = $get_Users ? $get_Users[0]['address'] : '';
        $edit_city = $get_Users ? $get_Users[0]['city'] : '';

        $pageData['title'] = 'Register As New User';
        $pageData['description'] = 'Create a account to shop track your order and etc..!!';
        $pageData['content'] = <<<HTML
        <section class="gradient-custom">
            <div class="container py-3">
                <div class="row  align-items-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                             <h5 style="color:red;margin-left:30px;"></h5>
                                <h2 class=" pb-2 pb-md-0">Register as a New User</h2>
                                <hr class="new5">
                                <form action="index.php?op=5" method="POST" value="registration_form" class="form-inline" enctype="multipart/form-data" name="reg_form">
                                <input type="hidden" name="op" value="5" >
                                <input type="hidden" name="hideflags" value="{$edit_id}">
                                    <div class="row">
                                    <h4 class="mb-4 pb-2 pb-md-0 mb-md-3">General Information</h4>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstName">First-LastName</label>
                                                <input type="text" name="fullname" id="txtfullnameid" class="form-control form-control-lg"  value="{$edit_fullname}" placeholder="FirstName and LastName" maxlength="50" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Address">Address Line</label>
                                                <input type="text" name="address" id="txtaddressid" class="form-control form-control-lg"  value="{$edit_address}" placeholder="Address" maxlength="255" required/>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="City">City(Optional)</label>
                                                <input type="text" id="City" class="form-control form-control-lg" name="city"  value="{$edit_city}"  maxlength="50"  />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Province">Province(Optional)</label>
                                                {$selected_province}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="City">Country(Optional)</label>
                                             {$countries_drop_down}

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Postal">Postal Code(Optional)</label>
                                                <input type="text" name="postalcode" maxlength="7" id="txtPostald" class="form-control form-control-lg" value="" placeholder="eg. A1B-2C3"/>
                                            </div>
                                        </div>
                                        <div class="col-md-1 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Postal">Language</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <input class="form-check-input" type="radio" name="language"  id="French" value="fn" checked/>
                                                <label class="form-check-label" for="French">French</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input
                                                class="form-check-input" type="radio" name="language" id="English"
                                                value="en" />
                                                <label class="form-check-label" for="English">English</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <div class="form-outline">
                                                <div class="form-check form-check-inline" style="display: flex;">
                                                    <input class="form-check-input" type="radio"
                                                        id="txtOtherid" value="otherlang" name="otherlang"
                                                    />
                                                    <label class="form-check-label" for="Other">Other</label>
                                                    <input type="text" id="OtherLanguage"  name="other_lang" class="form-control form-control-lg ms-3" maxlength="25" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                            <label class="form-label" for="Picture">Picture(optional)</label>
                                            <input type="file"  name="my_image" id="txtpictureld" class="form-control form-control-lg" value="" />
                                            </div>
                                        </div>
                                        <h4 class="mb-4 pb-2 pb-md-0 mb-md-5">Connection Information(required)</h4>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <input type="email" name="email" id="txtEmailid" class="form-control form-control-lg" placeholder="Email"  maxlength="350" value="{$edit_email}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <input type="password" name="pw" id="Password" class="form-control form-control-lg" placeholder="Password-Must be 8 char"   maxlength="8" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
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

        $DB = new db_pdo();
        // if (isset($_POST['province'])) {
        //     $provinces_list = $DB->querySelect("SELECT * FROM provinces WHERE code='".$_POST['province']."'");
        //     if (count($provinces_list) === 0) {
        //         Crash(400, 'Invalid Province code in registration form');
        //     }
        // }

        // $fullname = check_htmlentities(trim(isset($_POST['fullname']) ? $_POST['fullname'] : ''));
        $email = $pw = $pw2 = $fullname = $address = $city = $postal_code = $customerNumber = $level = '';

        $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
        $pw = trim(isset($_POST['pw']) ? $_POST['pw'] : '');
        $pw2 = trim(isset($_POST['pw2']) ? $_POST['pw2'] : '');
        $address = trim(isset($_POST['address']) ? $_POST['address'] : '');
        $city = trim(isset($_POST['city']) ? $_POST['city'] : '');
        $fullname = (trim(isset($_POST['fullname']) ? $_POST['fullname'] : ''));
        $postalcode = trim(isset($_POST['postalcode']) ? $_POST['postalcode'] : '');
        // $customerNumber = trim(isset($_POST['customerNumber']) ? $_POST['customerNumber'] : 123);

        if (trim(isset($_POST['province']))) {
            $province = $_POST['province'];
        } else {
            $province = '';
        }
        if (trim(isset($_POST['country']))) {
            $country = $_POST['country'];
        } else {
            $country = '';
        }
        $insert_lang = '';
        $other_lang = '';
        if (trim(isset($_POST['language']))) {
            $radioVal = $_POST['language'];

            if ($radioVal == 'fr') {
                $insert_lang = 'fr';
            } elseif ($radioVal == 'en') {
                $insert_lang = 'en';
            } else {
                $other_lang = $_POST['other_lang'];
            }
        }

        if (isset($_POST['spam_ok']) and (!empty($_POST['spam_ok']))) {
            $spam_ok = 1;
        } else {
            $spam_ok = 0;
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
        CIN('email', 350);
        CIN('fullname', 50);
        CIN('pw', 7);
        CIN('address', 255);
        CIN('city', 50);
        CIN('postalcode', 7);
        CIN('other_lang', 25);

        // check if email already exist
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
        // if (isset($_POST['spam_ok'])) {
        //     //if checkbox non check force value zero in input array
        //     $previous_data['spam_ok'] = 0;
        // }
        if ($errormsg !== '') {
            //clear password to avoid transmitting password over the sever
            $previous_data['pw'] = '';
            $previous_data['pw2'] = '';
            $this->register($previous_data, $errormsg); //anamefter error msg refil form
        } else {
            if (isset($_FILES['my_image']['name'])) {
                $pic_name = basename($_FILES['my_image']['name']);

                echo $pic_name;
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
            // $fullname = htmlentities($_POST['fullname']);
            if (isset($_POST['Continue'])) {
                $pw_hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
                $DB = new db_pdo();
                $sql_query = $DB->queryInsert("INSERT INTO users (email, pw,level, fullname, address, city, province, country,postal_code, language, other_lang, spam_ok, picture, customerNumber) VALUES
           ('$email','$pw_hash','admin', '$fullname','$address','$city',
            '$province','$country','$postalcode','$insert_lang','$other_lang',$spam_ok,'$pic_name',123)");

                Picture_Uploaded_Save_File('name', 'users_images/');

                $this->Logout();
            }
            //here call update function
            if (!empty($_POST['hideflags'])) {
                // echo 'hello';
                // var_dump($_GET['id']);
                //here check id in edit mode
                $this->Edit();
                // header('location: index.php?op=9'); //redirect to index page
                $pageData['title'] = 'User edit';
                $pageData['description'] = 'User edit';
                $pageData['content'] = 'User Edited';
                $pageData['message'] = 'Ok user edited';
            }
        }
    }

    public function List()
    {
        $DB = new db_pdo();
        $Users_table = $DB->querySelectParam('SELECT * FROM Users where level=:level',
       ['level' => 'admin']);
        $pageData['title'] = 'All Users';
        $pageData['description'] = 'Details of all users';
        $pageData['content'] = '<div class="table-responsive-lg col-lg-12 p-2 m-2" style="height:24em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
        $pageData['content'] .= '<thead class="thead-light"><th>Id</th><th>Email</th><th>Level</th><th>FullName</th><th>Action</th></thead>';
        $pageData['content'] .= '<tbody>';
        foreach ($Users_table as $each_table_row => $val) {
            $pageData['content'] .= '<tr>';
            $pageData['content'] .= '<td>'.$val['id'].'</td>';
            $pageData['content'] .= '<td>'.$val['email'].'</td>';
            $pageData['content'] .= '<td>'.$val['level'].'</td>';
            $pageData['content'] .= '<td>'.$val['fullname'].'</td>';
            $pageData['content'] .= '<td class="col-md-1"><span>
            <a href="index.php?op=4&id='.$val['id'].'" class="edit"><i class="fas fa-edit m-1"></i></a>
            <a href="index.php?op=8&id='.$val['id'].'" class="delete"><i class="fa fa-trash m-1" ></i></a>
            </span></td>';
            $pageData['content'] .= '</tr>';
        }

        $pageData['content'] .= '</tbody>';
        $pageData['content'] .= '</table></div>';
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function Delete()
    {
        $DB = new db_pdo();
        $Users_table = $DB->queryParam('Delete FROM Users where id=:id',
        ['id' => $_GET['id']]);
        header('location: index.php?op=9');
        $pageData['title'] = 'Delete User';
        $pageData['description'] = 'Delete the selected User';
        $pageData['content'] = 'User deleted';
        $pageData['message'] = 'Ok user deleted';
    }

    public function Edit()
    {
        header('location: index.php?op=4');
        $Users_table = $DB->queryParam('Update users set email='.$_POST['email'].',level='.$_POST['level'].',fullname='.$_POST['fullname'].' where id=:id', ['id' => $_GET['id']]);
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
