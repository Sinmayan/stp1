<?php
    require 'php_connect.php';
    session_start();
/**
 * Created by PhpStorm.
 * User: it16174290
 * Date: 16/08/2018
 * Time: 02:05
 */



    //$sid = $_POST['sid'];
    $sid=session_id();
    $sql = "select token from session1 where sid='$sid' limit 1";
    $result = mysqli_query($con,$sql);

    if($row=mysqli_fetch_array($result)){
        $r=$row['token'];
    }else{
        $r=session_id();
    }
    echo $r;