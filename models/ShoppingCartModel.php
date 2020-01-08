<?php

/**
 * 
 */
class ShoppingCartModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function setItem($id) {
        $sql = "SELECT * FROM items where id= '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $item = $query->fetch();

        if(empty($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = array( array($item->id,$item->name,$item->price, 1,$item->item_image));
        } else {
            $count = count($_SESSION['shopping_cart']);
            for ($i=0; $i < $count; $i++) {
                if($_SESSION['shopping_cart'][$i][0]==$id) {
                    $_SESSION['shopping_cart'][$i][3]++;
                    return 0;
                }
                else {
                    continue;
                }
            }
            $thisItem = array($item->id,$item->name,$item->price, 1,$item->item_image);
            array_push($_SESSION['shopping_cart'], $thisItem);
        }
    }

     public function orderItems(){
        if(isset($_SESSION['username']) && isset($_SESSION['id'])) {
            $loggedin = true;
            $userID = $_SESSION['id'];
            $price = 0;
            foreach ($_SESSION['shopping_cart'] as $product) {
                $price = $price + (double)$product[2] * (int) $product[3];
            }
            $price = 1.13*$price;

            try{
                $sql = "CALL issueOrder($userID, $price, @iid)";
                $query = $this->db->prepare($sql);
                $query->execute();
                $iid = $query->fetch();
                $iid = $iid->IID;
                foreach ($_SESSION['shopping_cart'] as $product) {
                    $id = $product[0];
                    $quantity = (int) $product[3];
                    $price = (double)$product[2];
                    $sql = "CALL itemOrder($iid, $id, $quantity, $price)";
                    $query = $this->db->prepare($sql);
                    $query->execute();
                }

                $temp = $_SESSION['shopping_cart'];

                unset($_SESSION['shopping_cart']);
                return $temp;
            } catch(Exception $e) {
                return $e;
            }
        } else {
            header('Location: '.URL.'login');
        }
    }

    public function removeItem($id) {
        $i=0;
        foreach ($_SESSION['shopping_cart'] as $item) {
            if($_SESSION['shopping_cart'][$i][0]==$id) {
                unset($_SESSION['shopping_cart'][$i]);
                sort($_SESSION['shopping_cart']);
            }
            $i++;
        }
    }

    public function updateItems($id,$qty) {
        $i=0;
        foreach ($_SESSION['shopping_cart'] as $product) {
            if($_SESSION['shopping_cart'][$i][0]==$id) {
                $_SESSION['shopping_cart'][$i][3] = $qty;
            }
            $i++;
        }
    }

    public function getItems() {
    	if(isset($_SESSION['shopping_cart']))
            return $_SESSION['shopping_cart'];
	    else
	    	return NULL;
    }

}