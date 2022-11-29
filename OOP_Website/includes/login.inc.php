<?php

if(isset($_POST["submit"])){

    //Grabbing the data
    //$variable = $_POST['variable in index.php .data from the user']
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];


    //Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    //object. $variable = new classname from signup-contr.classes.php + the ($variable data from the user)
    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup

    $login->loginUser();

    //Going to back to front page

    header("location: ../index.php?error=none");
}

?>