<?php

/**
 * Class Login_Reg
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */


class login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/login/index
     */
    public function index()
    {
        $title = 'GymStore - Login';
        $currentPage = 'Login';
        
        if(isset($_SERVER['HTTP_REFERER']))
            $_SESSION['http_referer'] = $_SERVER['HTTP_REFERER'];

        require 'application/views/_templates/nav.php';
        if(isset($_SESSION['id'])) header('Location:' .$_SERVER['HTTP_REFERER']);
        else require 'application/views/login/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function logincheck()
    {

        $title = 'GymStore - Login';
        $currentPage = 'Login';

        $login_model = $this->loadModel('LoginModel');
        $msg = $login_model->checkAccount();
        if(isset($msg)) {
            $_SESSION['id'] = $msg->userID;
            $_SESSION['username'] = $msg->userName;
            $_SESSION['email'] = $msg->email;
            $_SESSION['usertype'] = (int) $msg->userType;

            if($_SESSION['usertype']==1){
                header('Location: '.URL.'admin/');
            }
            else {
                header('Location: '.$_SESSION['http_referer'] );
            }
        }
        else {
            require 'application/views/_templates/nav.php';
            if(isset($_SESSION['id'])) header('Location: '.URL);
            else require 'application/views/login/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
}


