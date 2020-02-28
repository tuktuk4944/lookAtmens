<?php

    include("connect.php");
    $stock= $_POST['stock'];
    $num= $_POST['num'];
    $price =$_POST['hdnProductPrice'];
    $proid =$_POST['hdnProductID'];
    $proname =$_POST['hdnProductname'];
    $userid =$_POST['hdnUserID'];
    $username =$_POST['hdnUsername'];
    $total=$num*$price;
    $picture=$_POST['hdnProductPic'];
    $sql ="INSERT INTO orderProduct (proname,proid,price,userid,username,qty,total,picture)VALUES('$proname',$proid,$price,$userid,'$username',$num,$total,'$picture')";
    $result= $conn->query($sql);
    if($result){
        //เมื่อ register สำเร็จ
        echo "<script language='javascript'>alert('เพิ่มลงตะกร้า');</script>"; 
        header("Location: index.php?menu=detail&&pid=$proid");
    }
    else{
        echo "Error during insert: ".$conn->error;
    }

?>

