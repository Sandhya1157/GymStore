<?php

/**
 * Class AboutUs
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class AboutUs extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/aboutus/index
     */
    public function index()
    {
        $title = 'GymStore - About Us';
        $currentPage = 'About Us';
        $banner = 'public/banners/aboutus.jpg';
        
        require 'application/views/_templates/nav.php';
        require 'application/views/aboutus/index.php';
        require 'application/views/_templates/footer.php';
    }

}
