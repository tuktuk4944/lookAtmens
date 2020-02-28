<?php
    include("connect.php");
    $sql ="SELECT * FROM user WHERE id ";
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
        <h1>จัดการ User</h1>
        <a href="register.php" class="btn btn-success float-right"><i class="glyphicon glyphicon-plus"></i>เพิ่ม User</a>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" style="padding-bottom:20px">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">ค้นหาลูกค้า :</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="txtsearch5" placeholder="Search..">
                        </div>

                        <div class="col-md-2">
                            <button name="submit5" class="btn btn-block btn-light">
                                <i class="glyphicon glyphicon-search"></i> ค้นหา
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit5'])){  
            $search5 = $_POST['txtsearch5'];
            $sql = "SELECT * FROM  user WHERE fname LIKE '%$search5%' or lname LIKE '%$search5%'";
            
            $result = $conn->query($sql);
            
                        ?>

     <div class="container" style="margin-top:100px;">
            <div class="row " id="example">
            <?php
            while($prd = $result->fetch_object()){
            ?>
    <div class=" col-md-3 col-sm-4 col-xs-6">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px;margin-bottom:10px;">
                        <a href="#">
                            <img src="images/imgUser/<?php echo $prd->picture ?>"style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 "  alt="">
                        </a>
                        <div class="caption">
                            <a href="#"class="texth4 .text-white" ><h4 class=".text-white" ><?php echo $prd->fname ?> <?php echo $prd->lname ?></h4></a>
                        </div>
            
                            <a href="editprofile.php?uid=<?php echo $prd->id ?>" class="btn btn-warning" class=" col-md-12"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="deleteUser.php?pid=<?php echo $prd->id ?>" class="btn btn-danger" class=" col-md-12"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                </div>
        <?php 
    } 

        }
    else{
    ?>
        <div class="container">
            <div class="row " id="example">
            <?php
                    $sql ="SELECT * FROM user WHERE id ";
                    $result = $conn->query($sql);
                while($prd = $result->fetch_object()){
            ?>
                <div class=" col-md-3 col-sm-4 col-xs-6">
                    <div style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
                    <a href="#">
                            <img src="images/imgUser/<?php echo $prd->picture ?>"style="margin-bottom:10px" class="img-rounded col-md-12 col-sm-12 col-xs-12 "  alt="">
                        </a>
                        <div class="caption">
                            <a href="#"class="texth4 .text-white" ><h4 class=".text-white" ><?php echo $prd->fname ?> <?php echo $prd->lname ?></h4></a>
                        </div>
            
                            <a href="editprofile.php?uid=<?php echo $prd->id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="deleteUser.php?pid=<?php echo $prd->id ?>" class="btn btn-danger" linkDelete><i class="glyphicon glyphicon-trash"></i></a>
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