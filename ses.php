<?php
require 'php_connect.php';
//session_start();

/**
 * Created by PhpStorm.
 * User: it16174290
 * Date: 14/08/2018
 * Time: 21:06
 */
    function create_ses($un)
    {

        $sid = date("Ymd") . date("his");
        $token = $sid . 'hello'.$un;
        $sql = "INSERT INTO session1(un,sid,token) VALUES ('$un','$sid','$token')";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            return $sid;
        } else {
            header("Location: loginpage.php");
        }
    }

    function check_ses($sid,$name)
    {
        if(!isset($sid) || !isset($name) ){
            header("Location: loginpage.php");
        }

        //$sql = "SELECT * FROM session1 WHERE un='$name' AND sid='$sid'";
//
//        if (mysqli_num_rows(mysqli_query($GLOBALS['con'], $sql)) != 1 ) {
//            header("Location: loginpage.php");
//            exit();
//       }
    }
