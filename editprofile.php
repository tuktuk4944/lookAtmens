<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
        .has-error{
            color: red;
        }
        .has-success{
            color:green;
        }

    </style>
</head>
<body>
<?php
        //รับข้อมูลจากform register 
        include("connect.php");
        if(!isset($_GET['uid'])|| $_GET['uid']==""){
            header("location:index.php");
        }
        else{
            $pid = $_GET['uid'];
        }
        $sql="SELECT * FROM user WHERE id=$pid";
        $result=$conn->query($sql);
        if(!$result){
            echo "ERROR : ".$conn->error;
        }
        else{
            if($result->num_rows>0){
                $prd = $result->fetch_object();
            }
            else{
                $prd=NULL;
            }
        }

    ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" action="updateProfile.php">
					<span class="login100-form-title p-b-49">
						Edit Profile
					</span>
                    <div class="wrap-input100">
                        <div class="col-md-12">
                        <img src="images/imgUser/<?php echo $prd->picture; ?>"  style="margin-bottom:20px" class="img-circle  col-lg-12 col-md-12 col-sm-12 col-xs-12 " alt="">
                        </div>
                    </div>
					<div class="wrap-input100  m-b-23" >
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your Email" value="<?php echo  $prd->email; ?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    
                    <div class="wrap-input100 " >
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="newpassword" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="wrap-input100 " >
						<span class="label-input100">ชื่อ</span>
						<input class="input100" type="text" name="fname" placeholder="Type your First Name" value="<?php echo  $prd->fname; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					
					<div class="wrap-input100 " >
						<span class="label-input100">นามสกุล</span>
						<input class="input100" type="text" name="lname" placeholder="Type your Lastname"value="<?php echo  $prd->lname; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 " >
						<span class="label-input100">วันเกิด</span>
						<input class="input100" type="date" name="birthday" placeholder="Date Of Birth" value="<?php echo  $prd->birthday; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100 ">
                        <span class="label-input100">เพศ</span>
                        <?php if( $prd->gender == "ชาย"){?>
                            <div class="col-md-12 input100">
                                <input type="radio" id="male" name="gender" value="ชาย" checked>
                                    <label for="male">ชาย</label>
                                <input type="radio" id="female" name="gender" value="หญิง">
                                    <label for="female">หญิง</label>
                                <input type="radio" id="other" name="gender" value="ไม่ระบุฯ">
                                    <label for="other">อื่นๆ</label>
                                </div>
                        <?php
                        }
                        else if( $prd->gender == "หญิง"){?>
                            <div class="col-md-12 input100">
                                <input type="radio" id="male" name="gender" value="ชาย" >
                                    <label for="male">ชาย</label>
                                <input type="radio" id="female" name="gender" value="หญิง" checked>
                                    <label for="female">หญิง</label>
                                <input type="radio" id="other" name="gender" value="ไม่ระบุฯ">
                                    <label for="other">อื่นๆ</label>
                                </div>
                        <?php
                        }
                        else {?>
                            <div class="col-md-12 input100">
                                <input type="radio" id="male" name="gender" value="ชาย" >
                                    <label for="male">ชาย</label>
                                <input type="radio" id="female" name="gender" value="หญิง" >
                                    <label for="female">หญิง</label>
                                <input type="radio" id="other" name="gender" value="ไม่ระบุฯ" checked>
                                    <label for="other">อื่นๆ</label>
                                </div>
                        <?php
                        }
                        
                        ?>      
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100 " >
						<span class="label-input100">เบอร์โทรศัพท์</span>
						<input class="input100" type="text" name="tel" placeholder="Type your Tel" value="<?php echo  $prd->tel; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
	
					<div class="wrap-input100 " >
						<span class="label-input100">ที่อยู่</span>
						<input class="input100" type="text" name="address" placeholder="Type your Address" value="<?php echo  $prd->address; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 " >
						<span class="label-input100">ตำบล</span>
						<input class="input100" type="text" name="tumbon" placeholder="Type your Tumbon" value="<?php echo  $prd->tumbon; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 ">
						<span class="label-input100">อำเภอ</span>
						<input class="input100" type="text" name="amphur" placeholder="Type your Amphur" value="<?php echo  $prd->amphur; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 " >
						<span class="label-input100">จังหวัด</span>
						<input class="input100" type="text" name="province" placeholder="Type your Province" value="<?php echo  $prd->province; ?>">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 " style="margin-bottom:20px">
						<span class="label-input100">รหัสไปรษณีย์</span>
						<input class="input100" type="text" name="postcode" placeholder="Type your Postcode" value="<?php echo  $prd->postCode; ?>">
						<span class="focus-input100" data-symbol=""></span>
                    </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <input type="hidden" name="hdnProfileID" value="<?php echo $prd->id;?>">
                            <input type="hidden" name="hdnProfilePic" value="<?php echo $prd->picture;?>">
                            <input type="hidden" name="hdnProfilepass" value="<?php echo $prd->password;?>">
							<button class="login100-form-btn" type="submit" id="submit" name="submit">
								Edit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
