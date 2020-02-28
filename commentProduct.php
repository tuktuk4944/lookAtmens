<?php
include("connect.php");

$comment =$_POST['commentArea'];
$userid =$_POST['hdnUserID'];
$username =$_POST['hdnUsername'];
$proid=$_POST['hdnProductID'];
$usertype=$_POST['hdnUserType'];

        $sql = "INSERT INTO comment (comment,date,userid,rate,proid,username)VALUES('$comment',NOW(),$userid,5,$proid,'$username')";
        //echo $sqlInsert;
              //Mysqli_query
          $result=$conn->query($sql);
          if($result){
              //เมื่อ register สำเร็จ
              header("Location: index.php?menu=detail&pid=$proid");
          }
          else{
              echo "Error during insert: ".$conn->error;
          }



?>