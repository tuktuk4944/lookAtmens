<?php
    include("connect.php");
    $sql ="SELECT * FROM product WHERE id ";
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
<style>
    .texth4{
        color:#00d4be;
    }
</style>
<div class="container text-center " >
        <h1>จัดการรายการสินค้า</h1>
        <a href="index.php?menu=insert" class="btn btn-success float-right"><i class="glyphicon glyphicon-plus"></i>เพิ่มสินค้า</a>
        <a href="index.php?menu=export" class="btn btn-primary float-right"><i class="glyphicon glyphicon-export"></i>Convert to PDF</a>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" style="padding-bottom:20px">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">ค้นหาสินค้า :</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="txtsearch4" placeholder="Search..">
                        </div>

                        <div class="col-md-2">
                            <button name="submit3" class="btn btn-block btn-light">
                                <i class="glyphicon glyphicon-search"></i> ค้นหา
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit3'])){  
            $search4 = $_POST['txtsearch4'];
            $sql = "SELECT * FROM product WHERE proname LIKE '%$search4%'";
            
            $result = $conn->query($sql);
                        ?>

     <div class="container" style="margin-top:100px;">
            <div class="row " id="example">
            <?php
            while($prd = $result->fetch_object()){
            ?>
    <div class=" col-md-3 col-sm-4 col-xs-6">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                        <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>">
                            <img src="images/product/<?php echo $prd->picture ?>"style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 "  alt="">
                        </a>
                        <div class="caption">
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>"class="texth4 .text-white" ><h4 class=".text-white" ><?php echo $prd->proname ?></h4></a>
                            <h5>ราคา : <?php echo $prd->price ?> ฿</h5>
                        </div>
            
                            <a href="index.php?menu=edit&&pid=<?php echo $prd->id ?>" class="btn btn-warning" class=" col-md-12"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="index.php?menu=del&&pid=<?php echo $prd->id ?>" class="btn btn-danger" class=" col-md-12"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                </div>
        <?php 
    } 

        }
    else{
    ?>
        <div class="container">
            <div class="row" id="example">
            <?php
                    $sql ="SELECT * FROM product WHERE id ";
                    $result = $conn->query($sql);
                while($prd = $result->fetch_object()){
            ?>
                <div class=" col-md-3 col-sm-4 col-xs-6">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                        <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>">
                            <img src="images/product/<?php echo $prd->picture ?>" style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 " alt="">
                        </a>
                        <div class="caption">
                            <a href="index.php?menu=detail&&pid=<?php echo $prd->id; ?>"><h4><?php echo $prd->proname ?></h4></a>
                            <h5>ราคา : <?php echo $prd->price ?> ฿</h5>
                        </div>
            
                            <a href="index.php?menu=edit&&pid=<?php echo $prd->id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="index.php?menu=del&&pid=<?php echo $prd->id ?>" class="btn btn-danger" linkDelete><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                </div>
                        <?php
                        
                    }
                }
            ?>
                
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $(".linkDelete").click(function(){
            if(confirm("confirm delete?")){
                return true;
            }else{
                return false;
            }

            return confirm("confirm delete")
        });
    });
</script>