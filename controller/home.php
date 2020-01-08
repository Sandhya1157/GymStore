<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/home/index (which is the default page btw)
     */
    public function index()
    {        
        $home_model = $this->loadModel('homeModel');
        $slides = $home_model->getSlides();
        $items = $home_model->getItems();


        $title = $home_model->getTitle();
        $currentPage = $home_model->getCurrentPage();

        require 'application/views/_templates/nav.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
}

