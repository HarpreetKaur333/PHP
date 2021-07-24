<?php

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
                <div class="col-"
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
            <!-- <form action="index.php?op=2" method="POST">
            <div class="container ">
                <input type="hidden" name="op" value="2">
                <label for="email"><b>Email</b></label>  <input type='text' name='email' placeholder='Email' maxlength='255' required ><br> <br>

                <label for="password"><b>Password</b></label>   <input type="password" name="pw" placeholder="Password" maxlength="10" required><br>
                <label for="Continue"><b></b></label>  <br><input type="submit" value="Continue">
                <br>
             </div>
            </form> -->

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
        $users = $DB->querySelect("SELECT * FROM users WHERE email='".$email."'AND pw='".$pw."'");
        if (count($users) != 0 && $users != null) {
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

    public function Logout()
    {
        $_SESSION['email'] = null;
        $pageData['title'] = 'Logged Out';
        $pageData['content'] = '<h3>You are Logged out..!!!<h3>';

        $webPage = new WebPage();
        $webPage->render($pageData);
    }
}
