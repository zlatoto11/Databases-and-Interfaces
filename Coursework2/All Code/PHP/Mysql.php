<?php


require_once 'constants.php';


class Mysql {
    private $conn;
    
    function __Construct(){
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Problem establishing a connection to the database.');
    }
    
    function verify_Username_and_Pass($un,$pwd) {
        
        $query = "Select *
                FROM users
                WHERE username = ? AND password = ?
                LIMIT 1";
        
        if($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('ss',$un,$pwd);
            $stmt->execute();
            
            if($stmt->fetch()){
                $stmt->close();
                return true;
            }
        }
    }
    
}
?>