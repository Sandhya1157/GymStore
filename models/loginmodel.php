<?php 

/**
 * 
 */
class LoginModel
{
	 function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function checkAccount()
    {
    	if (isset($_POST['submit']))
    	{   
            $email= $_POST['uid'];
            $password = $_POST['pwd'];

    		$sql = "select userID, userType, userName, email, password from account where email = '$email'";
            $query = $this->db->prepare($sql);
			$query->execute();
            $rows = $query->fetchAll();

            foreach ($rows as $row) {
                if(password_verify($password, $row->password)) {
                    return $row;
                }
                else {
                    return false;
                }
            }
        }
    }
}