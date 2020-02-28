<?php
    if(isset($_GET['cat'])){
        $cat=$_GET['cat'];
    }
    else{
        header("location:index.php");
    }
    include("connect.php");
    $sql ="SELECT * FROM product WHERE protype='$cat' ";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error:".$conn->error;
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

<div class="container text-center">
        <div class="row ">
            <div class="panel-group">
                <div class="panel panel-info">
                    
                    <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapse1" >
                    <h4 class="panel-title">
                         <i class="	glyphicon glyphicon-filter"></i> ตัวกรอง
                    </h4> </a>
                    </div>
               
                    <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div>
                                <div class="col-md-1">
                                    ราคา :
                                </div>
                                <div class="col-md-2 ">
                                    <input type="text form-control" class="form-control" name="txtsearch1" placeholder="ราคาต่ำสุด">
                                </div>
                                <div class="col-md-2">
                                    <input type="text form-control" class="form-control" name="txtsearch3" placeholder="ราคาสูงสุด">
                                </div>
                                
                                <div class="col-md-2">
                                    เรียงตาม :
                                </div>
                                <div  class="col-md-2">
                                    <select name="searchcol"  class="form-control btn btn-light">
                                        <option value="0" >เรียงตาม</option>    
                                        <option value="1" >จากน้อยไปมาก</option>    
                                        <option value="2" >จากมากไปน้อย</option>    
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button name="submitproduct" class="btn btn-block btn-light">
                                        <i class="glyphicon glyphicon-triangle-right"></i>
                                    </button>
                                </div>
                            </div>
                            
                        </form> 
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
<?php
if(isset($_POST['submitproduct'])){
?>
        
        <div class="container">
            <div class="row " id="example">
            <?php

            $searchcol = $_POST['searchcol'];
            $sql = "SELECT * FROM product ";
            switch($searchcol){
                case 1 : $sql .= " WHERE protype='$cat' ORDER BY price ASC ";
                        break;
                case 2 : $sql .= " WHERE protype='$cat' ORDER BY price DESC";
                        break;
                default : 
                    $search1 = $_POST['txtsearch1'];
                    $search3 = $_POST['txtsearch3'];
                    $sql .= " WHERE protype='$cat'AND price BETWEEN $search1 AND $search3" ;
                        break;
                    }
                    $result = $conn->query($sql);
                    ?>
                        <div class="col-md-12 ">
                        <h4 class="all"><i class="glyphicon glyphicon-list-alt"></i>
                            <?php
                                    $records = $result->num_rows;
                                    echo "ค้นพบสินค้าทั้งหมด : ".$records." รายการ...";

                            ?>
                        </h4>
                    </div>
                    <?php

                while($prd = $result->fetch_object()){
            ?>

                <div class=" col-md-3 col-sm-4 col-xs-12">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                        <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>">
                            <img src="images/product/<?php echo $prd->picture ?>" alt="" style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 ">
                        </a>
                        <div class="caption">
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>"><h4 class=".text-white"><?php echo $prd->proname ?></h4></a>
                            <h2 class="text-right"> <?php echo $prd->price ?> ฿</h2>
                        </div>
                    <a href="insertOrder2.php?hdnProductID=<?php echo $prd->id;?>&&hdnProductPic=<?php echo $prd->picture;?>&&hdnProductPrice=<?php echo $prd->price;?>&&hdnProductname=<?php echo $prd->proname;?>&&hdnUserID=<?php echo $_SESSION['id']?>&&hdnUsername=<?php echo $_SESSION['name']?>" class="btn btn-info btn-block"> <i class="glyphicon glyphicon-shopping-cart"></i> Add To Cart</a>
                    </div>
                </div>
                        <?php
                        
                    }
            ?>
                
 
        </div>
    </div>
    <?php
                        
                }
                    else{
            ?>
        <div class="container">
            <div class="row " id="example">
            <?php
                    $sql ="SELECT * FROM product WHERE protype='$cat' ";
                    $result = $conn->query($sql);
                    ?>
                        <div class="col-md-12 ">
                        <h4 class="all"><i class="glyphicon glyphicon-list-alt"></i>
                            <?php
                                    $records = $result->num_rows;
                                    echo "ค้นพบสินค้าทั้งหมด : ".$records." รายการ...";

                            ?>
                        </h4>
                    </div>
                    <?php
                while($prd = $result->fetch_object()){
            ?>
                <div class=" col-md-3 col-sm-4 col-xs-12">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                        <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>" >
                            <img src="images/product/<?php echo $prd->picture ?>" style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 " alt="">
                        </a>
                        <div class="caption">
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>"><h4 class=".text-white"><?php echo $prd->proname ?></h4></a>
                            <h2 class="text-right"> <?php echo $prd->price ?> ฿</h2>
                        </div>
                
                    <a href="insertOrder2.php?hdnProductID=<?php echo $prd->id;?>&&hdnProductPic=<?php echo $prd->picture;?>&&hdnProductPrice=<?php echo $prd->price;?>&&hdnProductType=<?php echo $prd->protype;?>&&hdnProductname=<?php echo $prd->proname;?>&&hdnUserID=<?php echo $_SESSION['id']?>&&hdnUsername=<?php echo $_SESSION['name']?>" class="btn btn-info btn-block"> <i class="glyphicon glyphicon-shopping-cart"></i> Add To Cart</a>
                    </div>
                </div>
                        <?php
                        
                    }
            ?>
                
            </div>
        </div>

    <?php
                        
                    }
            ?>
    </div>