<?php
	
class AdminModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function insertItem($id_category){
        if (isset($_POST['submit']))
        {
            $itemName =strip_tags($_POST['itemName']);
            $itemPrice = strip_tags($_POST['price']);
            $itemDesc =strip_tags($_POST['description']);
            $itemStock =strip_tags($_POST['quantity']);
            $itemCategory = strip_tags($id_category);
            $target_dir = "public/products/";
            $filename = $_FILES["imageUpload"]["name"];
            $target_file = $target_dir . $_FILES["imageUpload"]["name"];
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file))
            {
                $sql = 'CALL insertItem($itemName, $itemPrice, $itemStock,$itemDesc, $filename, $id_category)';
                $query = $this->db->prepare($sql);
                $query->execute();
                return 'successful';
            } else {
                return 'Unsucessful';
            }
        }
    }

    public function remove($id) {
        try{
            $id = strip_tags($id);
            $sql = "CALL removeItem($id)";
            $query = $this->db->prepare($sql);
            $query->execute();
            return 'Sucessful';
        }
        catch(Exception $e) {
            return 'Unsucessful';
        }
    }

    public function getItems()
    {
        $sql = "SELECT id, name, description, quantity, image FROM items";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getAccounts() {
        $sql = "SELECT username, address, phone, email, usertype from account";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}