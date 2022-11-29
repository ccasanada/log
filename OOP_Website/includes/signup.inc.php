<?php

if(isset($_POST["submit"])){

    //Grabbing the data
    //$variable = $_POST['variable in index.php .data from the user']
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    //Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    //object. $variable = new classname from signup-contr.classes.php + the ($variable data from the user)
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //Running error handlers and user signup

    $signup->signupUser();

    //Going to back to front page

    header("location: ../index.php?error=none");
}

?>