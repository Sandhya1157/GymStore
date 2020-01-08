<?php

/**
 * Class ContactUs
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ContactUs extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/contactus/index
     */
    public function index()
    {
        $title = 'GymStore - Contact Us';
        $currentPage = 'Contact Us';
        $banner = 'public/banners/contactus.jpg';
        
        require 'application/views/_templates/nav.php';
        require 'application/views/contactus/index.php';
        require 'application/views/_templates/footer.php';
    }

}
