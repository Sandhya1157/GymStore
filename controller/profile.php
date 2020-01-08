<?php

/**
 * Class Profile
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Profile extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/profile/index
     */
    public function index()
    {
        $title = 'GymStore - Profile';
        $currentPage = 'Profile';
        $banner = 'public/banners/profile.jpg';
        
        require 'application/views/_templates/nav.php';
        require 'application/views/_templates/footer.php';
    }

}
