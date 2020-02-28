<?php
    session_start();
    include("connect.php");
    
    $pid = $_GET['pid'];
    $sql ="DELETE FROM orderProduct WHERE orderid=$pid";

    $result=$conn->query($sql);
    if(!$result){
        echo "Error: ".$conn->error;
    }
    else{
        $sql ="SELECT * FROM user WHERE id ";

        $result=$conn->query($sql);
        $prd =$result->fetch_object();
        $uid=$pid->id;
        header("Location: index.php?menu=cart&&uid=$uid");
    }
?>