<?php 

/**
 * 
 */
class RegisterModel
{
     function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function setAccount() {
        if (isset($_POST['submit']))
        {

            $username =$_POST['username'];
            $pwd = $_POST['pwd'];
            $Phone =$_POST['Phone'];
            $Email =$_POST['Email'];
            $Address =$_POST['Address'];
            
            //Error handlers
            //check for empty fields
                
            //check if input characters are valid
            if(!preg_match("/^[0-9]*$/", $Phone) ) {
                    return 3;
            }
            else {
                if(!preg_match("/^[a-zA-Z ]*$/", $username) ) {
                        return 0;
                }
                else {
                    if(!preg_match("/^[a-zA-Z]*$/", $Address)) {
                        return 1;
                    }
                    else {

                        //check if email is valid
                        $sql = "SELECT count(email) as 'CountEmail' FROM account WHERE email='$Email'";
                        $query = $this->db->prepare($sql);
                        $query->execute();
                        $resultCheck = $query->fetch(PDO::FETCH_ASSOC);
                        $resultCheck = (int) $resultCheck["CountEmail"];

                        if($resultCheck > 0) {
                            return 2;
                        }
                        else {
                            //hashing the password
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                            //insert the user into db
                            $sql ="INSERT INTO account (userName,phone,address,password,email) VALUES ('$username','$Phone','$Address','$hashedPwd','$Email')";
                            $query = $this->db->prepare($sql);
                            $query->execute();
                            $sql = "select LAST_INSERT_ID();";
                            $query = $this->db->prepare($sql);
                            $query->execute();
                            return $query->fetch();
                       }
                    }
                }
            }   
        }
    }   
}