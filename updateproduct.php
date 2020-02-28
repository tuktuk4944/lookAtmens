<?php 
    session_start();
    include("connect.php");
    
    $pid = $_POST['hdnProductID'];
    $name = $_POST['txtname'];
    $description = $_POST['txtdescription'];
    $price = $_POST['txtprice'];
    $protype = $_POST['protype'];
    $stocks = $_POST['txtstocks'];
    $stockm = $_POST['txtstockm'];
    $stockl = $_POST['txtstockl'];
    $stockxl = $_POST['txtstockxl'];
    
    $picture = $_POST['hdnProductPic'];
    if($_FILES['filepic']['name']!=''){
        //ถ้าอัปโหลดไฟล์มาให้เก็บชื่อไฟล์เอาไว้อัปเดตด้วย
        $picture = $_FILES['filepic']['name'];
        //move file
        move_uploaded_file($_FILES["filepic"]["tmp_name"],"images/product/".$_FILES["filepic"]["name"]);
    }
    $sql = "UPDATE product SET proname='$name',description='$description',price='$price',protype='$protype',stockS='$stocks',stockM='$stockm',stockL='$stockl',stockXL='$stockxl',picture='$picture' WHERE id =$pid";

    //echo $sql;

    $result=$conn->query($sql);
        if(!$result){
            echo "Error : ".$conn->error;
           
        }
        else{
            header("Location: index.php?menu=productAll");
        }
    
?>