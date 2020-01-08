<?php

/**
 * Class ShoppingCart
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ShoppingCart extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/gymStore/ShoppingCart/index (which is the default page btw)
     */
    public function index()
    {
        $title = '';
        $currentPage = '';
        $SC_model = $this->loadModel('ShoppingCartModel');
        $products = $SC_model->getItems();

        require 'application/views/ShoppingCart/index.php';
    }
    
    public function addItemsToCart($id)
    {   
        $id = strip_tags($id);

        $SC_model = $this->loadModel('ShoppingCartModel');
        $SC_model->setItem($id);
        
    }
    
    public function removeItemFromCart($id){

        $id = strip_tags($id);

        $SC_model = $this->loadModel('ShoppingCartModel');
        $SC_model->removeItem($id);
    }

    public function loadTable() {
        $SC_model = $this->loadModel('ShoppingCartModel');
        $products = $SC_model->getItems();
        require 'application/views/ShoppingCart/showTable.php';
    }

    public function checkOut() {
        $title = 'GymStore - CheckOut';
        $currentPage = 'ShoppingCart';

        if(!isset($_SERVER['HTTP_REFERER'])) {
            header('Location : '.URL);
        }
        else if(strcasecmp($_SERVER['HTTP_REFERER'],"http://localhost/gymstore/shoppingcart/viewcart/") && isset($_SESSION['shopping_cart'])) {
            $SC_model = $this->loadModel('ShoppingCartModel');
            $products = $SC_model->orderItems();

            require 'application/views/_templates/nav.php';
            require 'application/views/ShoppingCart/checkedOut.php';
            require 'application/views/_templates/footer.php';

        }
    }
    
    public function viewCart()
    {
        $title = 'GymStore - View Cart';
        $currentPage = 'ShoppingCart';


        $SC_model = $this->loadModel('ShoppingCartModel');
        $products = $SC_model->getItems();

        require 'application/views/_templates/nav.php';
        require 'application/views/ShoppingCart/viewCart.php';
        require 'application/views/_templates/footer.php';

    }

    public function count() {
        require 'application/views/_templates/scwidget.php';
    }

    public function updateCart($id,$qty) {
        if($qty>0){
            $SC_model = $this->loadModel('ShoppingCartModel');
            $SC_model->updateItems($id,$qty);
        }
    }
    
}