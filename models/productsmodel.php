<?php

/**
 * 
 */
class ProductsModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /*
    ** Get the all slider contents
    */
    public function getItems() {

        $sql = "select * from items
                        where enabled = 1 order by name asc";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function getCategories() {

        $sql = "SELECT * FROM categories";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function byCategory($name,$sort) {
        switch($sort){
            case "1":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image, categories.category from items
                        join item_category on items.id = item_category.id_item
                        join categories on item_category.id_category = categories.id
                        where categories.id = '$name' and enabled = 1 order by name asc";
                break;
            case "2":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image, categories.category from items
                        join item_category on items.id = item_category.id_item
                        join categories on item_category.id_category = categories.id
                        where categories.id = '$name' and enabled = 1 order by price asc";
                break;
            case "3":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image, categories.category from items
                        join item_category on items.id = item_category.id_item
                        join categories on item_category.id_category = categories.id
                        where categories.id = '$name' and enabled = 1 order by price desc";
                break;
            case "4":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image, categories.category from items
                        join item_category on items.id = item_category.id_item
                        join categories on item_category.id_category = categories.id
                        where categories.id = '$name' and enabled = 1 order by name desc";
                break;
            default:
                $sql = "select items.id, items.name, items.description, items.price, items.item_image, categories.category from items
                        join item_category on items.id = item_category.id_item
                        join categories on item_category.id_category = categories.id
                        where categories.id = '$name' and enabled = 1 order by name asc";
                break;
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function byDefault($sort) {
        switch($sort){
            case "1":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image from items
                        where items.enabled = 1 order by name asc";
                break;
            case "2":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image from items
                        where enabled = 1 order by price asc";
                break;
            case "3":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image from items
                        where enabled = 1 order by price desc";
                break;
            case "4":
                $sql = "select items.id, items.name, items.description, items.price, items.item_image from items
                        where enabled = 1 order by name desc";
                break;
            default:
                $sql = "select items.id, items.name, items.description, items.price, items.item_image from items
                        where enabled = 1 order by name asc";
                break;
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function itemCount($name){
        $sql = "select count(items.id) as 'CountItems'
                from items
                join item_category on items.id = item_category.id_item
                join categories on item_category.id_category = categories.id
                where categories.id = '$name'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->CountItems;
    }
    public function itemCountDefault() {
        $sql = "select count(items.id) as 'CountItems' from items";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->CountItems;
    }
    public function getInfo($id) {
        $sql = "select * from items where id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}

