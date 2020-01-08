<?php 

/**
 * 
 */
class ContactModel
{
     function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}