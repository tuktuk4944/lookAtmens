<?php
    session_start();
    include("connect.php");
    error_reporting(~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Look At Men's Ver.2</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/43a72b27d6.js"></script>


    <script src="js/loadingoverlay.min.js"></script>


</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<div id="wrapper">

    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar"  aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo_project.png" style="width:70px;margin-top:-10px" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="index.php" ><i class="glyphicon glyphicon-home"></i> หน้าแรก</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false" ><i class="glyphicon glyphicon-usd"></i> เสื้อ <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?menu=product&&cat=ยืด"><i class="glyphicon glyphicon-chevron-right"></i> เสื้อยืด</a></li>
                            <li><a href="index.php?menu=product&&cat=เชิ้ต"><i class="glyphicon glyphicon-chevron-right"></i> เสื้อเชิ้ต</a></li>
                            <li><a href="index.php?menu=product&&cat=โปโล"><i class="glyphicon glyphicon-chevron-right"></i> เสื้อโปโล</a></li>
                            <li><a href="index.php?menu=product&&cat=กันหนาว"><i class="glyphicon glyphicon-chevron-right"></i> เสื้อกันหนาว</a></li>
                            <li><a href="index.php?menu=product&&cat=สูท"><i class="glyphicon glyphicon-chevron-right"></i> เสื้อสูท</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false" ><i class="glyphicon glyphicon-ruble"></i> กางเกง <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?menu=product&&cat=ขาสั้น"><i class="glyphicon glyphicon-chevron-right"></i> กางเกงขาสั้น</a></li>
                            <li><a href="index.php?menu=product&&cat=ชิโน"><i class="glyphicon glyphicon-chevron-right"></i> กางเกงชิโน</a></li>
                            <li><a href="index.php?menu=product&&cat=ยีนส์"><i class="glyphicon glyphicon-chevron-right"></i> กางเกงยีนส์</a></li>
                            <li><a href="index.php?menu=product&&cat=ว่ายน้ำ"><i class="glyphicon glyphicon-chevron-right"></i> กางเกงว่ายน้ำ</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?menu=about" ><i class="glyphicon glyphicon-info-sign"></i> เกี่ยวกับ</a></li>
                    <li><a href="index.php?menu=news" ><i class="glyphicon glyphicon-bullhorn"></i> ข่าวสาร <span class="label label-danger">New</span></a></li>
                    <li >
                        <form class="navbar-form navbar-left" action="" method="POST" >
                            <div class="input-group" >
                                <input type="text" class="form-control " name="txtsearch2" placeholder="ค้นหาสินค้า...">
                                <div class="input-group-btn ">
                                    <button class="btn btn-default" name="submit" type="submit" >
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
  
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
                    if(isset($_SESSION['id'])){
                    ?>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false"> 
                            <img src="images/imgUser/<?php echo $_SESSION['pic'] ?> " class="img-circle" style="width:30px;height:30px;" alt=""> Welcome <?php 
                                if($_SESSION['usertype']=="admin"){
                                    echo "Admin ";
                                    ?><span class="caret">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="editprofile.php?uid=<?php echo $_SESSION['id'] ?>">บัญชีของฉัน</a></li>
                                        <li><a href="index.php?menu=his&&uid=<?php echo $_SESSION['id']?>">การซื้อของฉัน</a></li>
                                        <li><a href="index.php?menu=productAll">จัดการสินค้า</a></li>
                                        <li><a href="index.php?menu=Muser">จัดการ User</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="logout.php">ออกจากระบบ</a></li>
                                    </ul>
                                    
                                <?php
                                }
                                else {
                                    echo $_SESSION['name']; ?><span class="caret">
                                    <ul class="dropdown-menu">
                                        <li><a href="editprofile.php?uid=<?php echo $_SESSION['id'] ?> ">บัญชีของฉัน</a></li>
                                        <li><a href="index.php?menu=his&&uid=<?php echo $_SESSION['id']?>">การซื้อของฉัน</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="logout.php">ออกจากระบบ</a></li>
                                    </ul>
                                    </a>
                                <?php
                                }

                                ?> 
                    </li>
                    <li>
                        <a href="index.php?menu=cart&&uid=<?php echo $_SESSION['id'] ?>" >
                        <?php
                            $userid=$_SESSION['id'];
                             $sqlor="SELECT * FROM orderProduct WHERE userid=$userid";

                             $resultor=$conn->query($sqlor);
                             $records = $resultor->num_rows;
                        ?>
                            <i class="glyphicon glyphicon-shopping-cart" ></i> <span class="label label-danger"><?php echo $records ?></span>
                        </a>
                    </li>
                    <?php
                        }
                        else {
                    ?>
                    <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    
                    <?php
                        }
                    ?>
      </ul>
    </div>
  </div>
</nav>


<?php
        if(isset($_POST['submit'])){  
            $search2 = $_POST['txtsearch2'];
            $sql = "SELECT * FROM product WHERE proname LIKE '%$search2%'";
            
            $result = $conn->query($sql);
            while($prd = $result->fetch_object()){
                        ?>

<div class="container" style="margin-top:90px;">
            <div class="row" id="example">
            <?php
                    $sql ="SELECT * FROM product WHERE proname LIKE '%$search2%'";
                    $result = $conn->query($sql);
                    ?>
                        <h3><?php echo "ผลการค้นหา : ".$search2; ?></h3>
                    <?php
                while($prd = $result->fetch_object()){
            ?>
                <div class=" col-md-3 col-sm-4 col-xs-6">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                        <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>">
                            <img src="images/product/<?php echo $prd->picture ?>" style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 " alt="">
                        </a>
                        <div class="caption">
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>"><h4><?php echo $prd->proname ?></h4></a>
                            <h5>Price : <?php echo $prd->price ?> Baht</h5>
                        </div>
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> See More..</a>
                    </div>
                </div>
                        <?php
                } 
                    }
            ?>
                
            </div>
        </div>
                        <?php
            }
            else{
                        ?>
    
    <!-- Page Content -->

        <div class="container-fluid" style="margin:20px;margin-top:90px;">
            <?php
                $menu="";
                $page="";
                if(isset($_GET['menu'])){
                    $menu = $_GET['menu'];
                }
                switch($menu){
                    case "product": 
                        {$page = "showproduct.php"; break;}
                    case "productAll": 
                        {$page = "showproductAll.php"; break;}
                    case "detail": 
                        {$page = "productdetail.php"; break;}
                    case "insert": 
                        {$page = "insertProduct.php"; break;}
                    case "del": 
                        {$page = "deleteproduct.php"; break;}
                    case "edit": 
                        {$page = "editproduct.php"; break;}
                    case "cart": 
                        {$page = "order.php"; break;}
                    case "about": 
                        {$page = "about.php"; break;}
                    case "news": 
                        {$page = "news.php"; break;}
                    case "Muser": 
                        {$page = "showuserAll.php"; break;}
                    case "export": 
                        {$page = "export.php"; break;}
                    case "his": 
                        {$page = "HistoryOrder.php"; break;}
                    default: $page = "main.php";
                }
                include($page);
            ?>   
        </div>

</div>
            <?php } ?>
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <div class="row" style="background:#171717;color:#00d4be;text-align:left;font-size:18px;border-top: 5px solid #00d4be">
      <div class="col-md-6 col-sm-6 col-xs-12">
          <ul class="content-title" style="list-style: none;">Contact
            <li class="cont"><i class="fas fa-phone-alt"></i> เบอร์โทร : 062-6533564</li>
            <li class="cont"><i class="fas fa-envelope"></i> E-mail : Look.mens@gmail.com</li>
            <li class="cont"><i class="fas fa-map-marker-alt"></i> สำนักงาน : 152/3 ม.3 ต.พระประโทน อ.เมือง จ.นครปฐม 73000</li>
          </ul>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <ul class="content-title"  style="list-style: none;">Social
            <li class="cont"><i class="fab fa-facebook-square"></i> Facebook : Look At Men's</li>
            <li class="cont"><i class="fab fa-line"></i> Line : @Look@mens</li>
            <li class="cont"><i class="fab fa-instagram"></i> Instagram : Look@_mens</li>
          </ul>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12" style="background:#000000;color:#fff;text-align:center;">
      .Copyright &COPY;2019 Look At Men's, All right reserved.
      </div>
  </div>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
