<?php 
    session_start();
    include("connect.php");
        $pid = $_POST['hdnProfileID'];
        $firstname =$_POST['fname'];
        $lastname =$_POST['lname'];
        $email =$_POST['email'];
        $newpassword =md5($conn->real_escape_string($_POST['newpassword']));
        $dob =$_POST['birthday'];
        $gender =$_POST['gender'];
        $tel =$_POST['tel'];
        $address =$_POST['address'];
        $tumbon =$_POST['tumbon'];
        $amphur =$_POST['amphur'];
        $province =$_POST['province'];
        $postcode =$_POST['postcode'];
        
        $sql = "UPDATE user SET fname='$firstname',lname='$lastname',email='$email',password='$newpassword',birthday='$dob',gender='$gender',tel='$tel',address='$address',tumbon='$tumbon',amphur='$amphur',province='$province',postCode='$postcode' WHERE id =$pid";
    
        //echo $sql;
    
        $result=$conn->query($sql);
            if(!$result){
                echo "Error : ".$conn->error;
               
            }
            else{
                header("Location: index.php");
            }
          ?>