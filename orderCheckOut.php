<?php

    include("connect.php");
    $totalAll= $_GET['totalAll'];
    $userid= $_GET['userid'];
    $sql ="INSERT INTO orderCheckOut (totalAll,Date,userid,status)VALUES($totalAll,NOW(),$userid,0)";
    $result= $conn->query($sql);
    if($result){
        //เมื่อ register สำเร็จ
        $sql ="DELETE FROM orderProduct WHERE userid=$userid";
        $result= $conn->query($sql);
        echo "<script language='javascript'>alert('เพิ่มลงตะกร้า');</script>"; 
        header("Location: index.php?menu=cart&&uid=$userid");
    }
    else{
        echo "Error during insert: ".$conn->error;
    }

?>

