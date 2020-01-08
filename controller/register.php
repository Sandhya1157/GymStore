<?php

/**
 * Class Login_Reg
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */


class Register extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/Register/index
     */
    public function index()
    {
        $title = 'GymStore - Register';
        $currentPage = 'Register';
        
        
        require 'application/views/_templates/nav.php';
        require 'application/views/Register/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function signup()
    {

        $title = 'GymStore - Register';
        $currentPage = 'Register';
        

        $register_model = $this->loadModel('RegisterModel');
        $msg = $register_model->setAccount();
        
        require 'application/views/_templates/nav.php';
        if ($msg>3) {
            echo    '<div class="container" >
                        <div class="row">
                            <div class="media_title">
                                <h1>Your account has been approved.</h1>
                            </div>
                        </div>
                    </div>';
            header('Refresh: 3, '.URL);
        } else {
            $error = $msg;
            require 'application/views/register/index.php';
        }
        require 'application/views/_templates/footer.php';
    }
}

    