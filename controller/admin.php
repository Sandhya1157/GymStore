<?php

class Admin extends Controller
{

     public function index()
    {
        $title = 'GymStore - Admin';
        $currentPage = 'Admin';
        $products_model = $this->loadModel('ProductsModel');
        $categories = $products_model->getCategories();

        $items = $products_model->getItems();
        
        require 'application/views/_templates/nav.php';
        require 'application/views/admin/index.php';
        require 'application/views/_templates/footer.php';
    }
    public function items(){
        $products_model = $this->loadModel('ProductsModel');
        $categories = $products_model->getCategories();

        $items = $products_model->getItems();
        require 'application/views/admin/items.php';
    }

    public function removeItems($id) {
        $id = strip_tags($id);
        $admin_model = $this -> loadModel('AdminModel');
        $message = $admin_model->remove($id);   
    }

    public function accounts(){
        $admin_model = $this->loadModel('AdminModel');
        $accounts = $admin_model->getAccounts();

        require 'application/views/admin/accounts.php';
    }

    public function insert(){
        if(isset($_POST['submit']))
        {
            $admin_model = $this->loadModel('AdminModel');
            $result = $admin_model->insertItem();
        }
    }

    public function setID($id)
    {
        $admin_model = $this -> loadModel('AdminModel');
        $message = $admin_model->setAccountId();

        require 'application/views/admin/accounts.php';

    }
}