<?php

    include("connect.php");
         $userid = $_SESSION['id'];
         $totalAll=0;

        $sql ="SELECT * FROM orderProduct WHERE userid=$userid";
        $result= $conn->query($sql);

?>

<div class="container">
    <div class="row">
        <h2>My Cart</h2>
        <?php
         if($result->num_rows>0){
            while($od= $result->fetch_object()){
        ?>
        <div class=" col-md-3 col-sm-4 col-xs-6">
        <div  style="background:#fff;border:1px solid #101010;border-radius:10px;padding:10px">
        <img src="images/product/<?php echo $od->picture; ?>"class=" col-md-12 " alt="">
        <h3><?php echo $od->proname; ?></h3>
        <p>ราคาต่อชิ้น : <?php echo $od->price; ?></p>
        <p>จำนวน : <?php echo $od->qty; ?></p>
        <h3>(<?php echo $od->price; ?>x <?php echo $od->qty; ?>) <?php echo $od->total; ?> บาท</h3>
        
        
        <a href="deleteOrder.php?pid=<?php echo $od->orderid; ?>" class="btn btn-danger linkDelete"> <i class="	glyphicon glyphicon-remove"></i></a>
        <?php  
            $totalAll=$od->total+$totalAll
        ?>
        </div>
                </div>
<?php
    }
}
else{
    ?>
        <div class="text-center" >
            <h1 style="color:#B3B3B3"> <i class="	glyphicon glyphicon-shopping-cart"></i> ไม่มีสินค้าในตะกร้า</h1>

</div>
    <?php
}

?>

    </div>
    <div class="row" style="margin-top:20px">
    <a href="orderCheckOut.php?totalAll=<?php echo $totalAll ?>&&userid=<?php echo $userid ?>" class="btn btn-success btn-block btn-lg"> <i class="glyphicon glyphicon-credit-card"></i> ชำระเงิน ทั้งสิ้น <?php echo $totalAll ?> บาท</a>
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
