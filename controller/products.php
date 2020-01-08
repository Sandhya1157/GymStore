<?php

/**
 * Class Products
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Products extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/products/index
     */
    public function index()
    {
        $title = 'GymStore - Products';
        $currentPage = 'Products';
        $banner = 'public/banners/banner-1.jpg';
        
        $products_model = $this->loadModel('ProductsModel');
        $items = $products_model->getItems();
        $categories = $products_model->getCategories();
        $item_count = $products_model->itemCountDefault();

        require 'application/views/_templates/nav.php';
        require 'application/views/products/index.php';
        require 'application/views/_templates/footer.php';
    }
    public function sortDefault($sort) {
        $products_model = $this->loadModel('ProductsModel');
        $items = $products_model->byDefault($sort);
        $categories = $products_model->getCategories();
        $item_count = $products_model->itemCountDefault();
        
        require 'application/views/products/items.php';
    }

    public function category($name, $sort)
    {
        $products_model = $this->loadModel('ProductsModel');
        $categories = $products_model->getCategories();
        $items = $products_model->byCategory($name, $sort);
        $item_count = $products_model->itemCount($name);

        require 'application/views/products/items.php';
    }

    public function details($id) {
        $title = 'GymStore - Products';
        $currentPage = 'Products';
        $banner = 'public/banners/banner-1.jpg';


        $products_model = $this->loadModel('ProductsModel');
        $info = $products_model->getInfo($id);
        require 'application/views/_templates/nav.php';
        require 'application/views/products/details.php';
        require 'application/views/_templates/footer.php';
    }
}

