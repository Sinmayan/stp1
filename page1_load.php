<?php
    session_start();
    require 'php_connect.php';
     $si= session_id();

if(isset($_POST['submit'])) {

    if (isset($_POST['na']) && isset($_POST['pn']) && isset($_POST['job']) && isset($_POST['csrf_token'])) {
        $na = $_POST['na'];
        $pn = $_POST['pn'];
        $job = $_POST['job'];
        $ct = $_POST['csrf_token'];

        $sql2 = "select * from session1 where sid='$si' AND token='$ct' limit 1";
        $result = mysqli_query($con, $sql2);

        if ($row = mysqli_fetch_array($result)) {
            $sql = "INSERT INTO emp(name,phone,job) VALUES ('$na','$pn','$job')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Event Successful');location=\"page1.php\";</script>";
                //header("Location: page1.php");

            } else {
                //die('Error2: '.mysqli_error($con));
                echo "<script>alert('cannot upload your data' );location=\"page1.php\";</script>";
                //header("Location: page1.html");
            }
        } else {
            echo "<script>alert('token is unavailable');location=\"page1.php\";</script>";
        }

    }else {
        echo "<script>alert('one or more fields are empty');location=\"page1.php\";</script>";
    }
}
