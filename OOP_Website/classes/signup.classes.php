<?php

class Signup extends Dbh{

    protected function setUser($uid, $pwd, $email){
        //second -> is to run a sql statement and query it inside the database
        // question mark (?) is depend what you click
        //checking the username ($uid)(above from the checkUser) from the user submitted is equal to any username inside the database
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        //to know if there's something error in the database
        // under the execute method it will replace the questiona mark (?) 
        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;     
    }

    protected function checkUser($uid, $email){
        //second -> is to run a sql statement and query it inside the database
        // question mark (?) is depend what you click
        //checking the username ($uid)(above from the checkUser) from the user submitted is equal to any username inside the database
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    
        //to know if there's something error in the database
        // under the execute method it will replace the questiona mark (?) 
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() > 0 ){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    
    
    }

}



?>