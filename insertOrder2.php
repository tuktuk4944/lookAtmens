<?php

    include("connect.php");
    $num= 1;
    $price =$_GET['hdnProductPrice'];
    $proid =$_GET['hdnProductID'];
    $proname =$_GET['hdnProductname'];
    $protype =$_GET['hdnProductType'];
    $userid =$_GET['hdnUserID'];
    $username =$_GET['hdnUsername'];
    $total=$num*$price;
    $picture=$_GET['hdnProductPic'];
    $sql ="INSERT INTO orderProduct (proname,proid,price,userid,username,qty,total,picture)VALUES('$proname',$proid,$price,$userid,'$username',$num,$total,'$picture')";
    $result= $conn->query($sql);
    if($result){
        //เมื่อ register สำเร็จ
        echo "<script language='javascript'>alert('เพิ่มลงตะกร้า');</script>"; 
        header("Location: index.php?menu=product&&cat=$protype");
    }
    else{
        echo "Error during insert: ".$conn->error;
    }

?>

