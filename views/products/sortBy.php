<?php

	function sortBy()
    {
        if(isset($_POST['show_dropdown_value']))
        {
            $varCategory = 'orderlist';

            switch($varCountry)
            {
                case '1':
                    $products_model = $this->loadModel('ProductsModel');
                    $items = $products_model->getItemsNameAsc();
                    break;

                case '2': 
                    $products_model = $this->loadModel('ProductsModel');
                    $items = $products_model->getItemsPriceAsc();
                    break;
                
                case '3':
                    $products_model = $this->loadModel('ProductsModel');
                    $items = $products_model->getItemsPriceAsc();
                    break;

                case '4':
                    $products_model = $this->loadModel('ProductsModel');
                    $items = $products_model->getItemsPriceDsc();
                    break;
            }
        }
    }
?>