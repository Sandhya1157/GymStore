<?php

/**
 * 
 */
class HomeModel
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
    public function getSlides() {

        $sql = "SELECT id, heading, description, image FROM slider";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function getItems() {

        $sql = "SELECT * FROM items where enabled = 1 ORDER BY SOLD DESC limit 10";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function getTitle() {
        return 'GymStore - Welcome';
    }

    public function getCurrentPage() {
        return 'Home';
    }


}