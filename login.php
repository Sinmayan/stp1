<?php
/**
 * Created by PhpStorm.
 * User: it16174290
 * Date: 07/08/2018
 * Time: 00:02
 */

    require 'php_connect.php';
    require 'ses.php';
    //    if(isset($POST['submit1'])) {
    if (isset($_POST['name']) && isset($_POST['pass'])) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM user WHERE un='$name' AND pw='$pass'";

        if (mysqli_num_rows(mysqli_query($con, $sql)) == 1) {

            session_id(create_ses($name));
            session_start();
            $_SESSION['un']=$name;
            header("Location: page1.php");
        } else {
            echo "<script>alert('login failed' );location=\"loginpage.php\";</script>";
            //header("Location: loginpage.php?");
        }

    } else {
        echo "<script>alert('one or more column are not filled' );location=\"loginpage.php\";</script>";
    //        }
    }