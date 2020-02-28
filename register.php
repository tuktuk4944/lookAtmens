<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
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
  if(isset($_POST['submit'])){    //Check if it is posted back
	  //รับข้อมูล
	  $firstname =$_POST['fname'];
	  $lastname =$_POST['lname'];
	  $email =$_POST['email'];
	  $password =md5($conn->real_escape_string($_POST['password']));
	  $confirmpassword =md5($conn->real_escape_string($_POST['confirmpassword']));
	  $dob =$_POST['birthday'];
	  $gender =$_POST['gender'];
	  $tel =$_POST['tel'];
	  $address =$_POST['address'];
	  $tumbon =$_POST['tumbon'];
	  $amphur =$_POST['amphur'];
	  $province =$_POST['province'];
	  $postcode =$_POST['postcode'];

	  if($confirmpassword == $password){
		  $sqlInsert = "INSERT INTO user (userType,fname,lname,email,password,birthday,gender,tel,address,tumbon,amphur,province,postCode,picture)VALUES('customer','$firstname','$lastname','$email','$password','$dob','$gender','$tel','$address','$tumbon','$amphur','$province','$postcode','0.jpg')";
		  //echo $sqlInsert;
		  	  //Mysqli_query
			$result=$conn->query($sqlInsert);
			if($result){
				//เมื่อ register สำเร็จ
				echo "<script language='javascript'>alert('Register Complete');</script>"; 
				header("Location: index.php");
			}
			else{
				echo "Error during insert: ".$conn->error;
			}
	  }
	  else{
		echo "<script language='javascript'>alert('Password is not Match');</script>";
	  }
		}

    ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Confirm Password is Not match">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="confirmpassword" placeholder="Type your confirmpassword">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="First Name is required">
						<span class="label-input100">ชื่อ</span>
						<input class="input100" type="text" name="fname" placeholder="Type your First Name">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Last Name is required">
						<span class="label-input100">นามสกุล</span>
						<input class="input100" type="text" name="lname" placeholder="Type your Lastname">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Last Name is required">
						<span class="label-input100">วันเกิด</span>
						<input class="input100" type="date" name="birthday" placeholder="Date Of Birth">
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100" >
						<span class="label-input100">เพศ</span>
                                <div class="col-md-12 input100">
                                <input type="radio" id="male" name="gender" value="ชาย" checked>
                                    <label for="male">ชาย</label>
                                <input type="radio" id="female" name="gender" value="หญิง">
                                    <label for="female">หญิง</label>
                                <input type="radio" id="other" name="gender" value="ไม่ระบุฯ">
                                    <label for="other">อื่นๆ</label>
                                </div>
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Tel is required">
						<span class="label-input100">เบอร์โทรศัพท์</span>
						<input class="input100" type="text" name="tel" placeholder="Type your Tel">
						<span class="focus-input100" data-symbol=""></span>
					</div>
	
					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<span class="label-input100">ที่อยู่</span>
						<input class="input100" type="text" name="address" placeholder="Type your Address">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Tumbon is required">
						<span class="label-input100">ตำบล</span>
						<input class="input100" type="text" name="tumbon" placeholder="Type your Tumbon">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Amphur is required">
						<span class="label-input100">อำเภอ</span>
						<input class="input100" type="text" name="amphur" placeholder="Type your Amphur">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Province is required">
						<span class="label-input100">จังหวัด</span>
						<input class="input100" type="text" name="province" placeholder="Type your Province">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Postcode is required">
						<span class="label-input100">รหัสไปรษณีย์</span>
						<input class="input100" type="text" name="postcode" placeholder="Type your Postcode">
						<span class="focus-input100" data-symbol=""></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" id="submit" name="submit">
								Sign up
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							<a href="login.php"> Or Login</a>
						</span>
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
<script>
        $(document).ready(function () {
            $("#form1").validate({
                rules: {
                    "email": {
                        "required": true,
                        "email": true
                    },
                    "password": "required",
                    "confirmpassword": "required",
                    "fname": "required",
                    "lname": "required",
                    "tel": "required",
                },
                messages: {
                    "email": {
                        "required": "E-mail is required.",
                        "email": "E-mail is invalid."
                    },
                    "password": "Please input Password.",
                    "confirmpassword": "Password don't match.",
                    "fname": "First name is required.",
                    "lname": "Last name is required.",
                    "tel": "phone number is required.",

                },
                highlight: function (element) {
                    $(element).closest("div").addClass('has-error').removeClass('has-success');

                },
                unhighlight: function (element) {
                    $(element).closest("div").addClass('has-success').removeClass('has-error');
                }
            });
        });
    </script>