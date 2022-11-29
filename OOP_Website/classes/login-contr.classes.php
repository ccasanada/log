<?php

class LoginContr extends Login{

    // after the private $variable is a properties inside the class
    private $uid;
    private $pwd;


    //inside the __construct is what we grab from the user
    //inside the __contruct is grab the data what we get from the user and assign it to the properties
    public function __construct($uid, $pwd){
        //$this-> properties = inside the construct
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser(){
       if($this->emptyInput() == false){
            //echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
       }
        
        $this->getUser($this->uid, $this->pwd);
    }

    //to check if the form is fill up all
    private function emptyInput(){
        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}



?>