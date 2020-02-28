<?php
    include("connect.php");
    error_reporting(~E_NOTICE);
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
    }
    else{
        header("location:index.php");
    }

    $sql ="SELECT * FROM product WHERE id=$pid";
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
    $sqlcom ="SELECT * FROM comment WHERE id";
    $resultcom = $conn->query($sqlcom);
    if(!$resultcom){
        echo "Error:".$conn->error;
    }
    else{
        if($resultcom->num_rows>0){
            $com = $resultcom->fetch_object();
        }
        else{
            $com=NULL;
        }
    }
?>
<style>
    .checked {
        color: orange;
    }
</style>
<script src="js/JS-Slide.js"></script>
<link rel="stylesheet" href="css/styleInfo.css" type="text/css" />
<div class="container">
    <div class="row">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="thumbnail">
                    <div class="info-product-all">
                        <!-- Container for the image gallery -->
                        <div class="containerR">

                            <!-- Full-width images with number text -->
                            <div class="mySlides showw">
                                <div class="numbertext">1 / 4</div>
                                <img src="images/product/<?php echo $prd->picture ?>" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">2 / 4</div>
                                <img src="images/product/<?php echo $prd->picture ?>" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">3 / 4</div>
                                <img src="images/product/<?php echo $prd->picture ?>" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">4 / 4</div>
                                <img src="images/product/<?php echo $prd->picture ?>" style="width:100%">
                            </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            <!-- Thumbnail images -->
                            <div class="row">
                                <div class="column">
                                    <img class="demo cursor" src="images/product/<?php echo $prd->picture ?>"
                                        style="width:100%" onclick="currentSlide(1)">
                                </div>
                                <div class="column">
                                    <img class="demo cursor" src="images/product/<?php echo $prd->picture ?>"
                                        style="width:100%" onclick="currentSlide(2)">
                                </div>
                                <div class="column">
                                    <img class="demo cursor" src="images/product/<?php echo $prd->picture ?>"
                                        style="width:100%" onclick="currentSlide(3)">
                                </div>
                                <div class="column">
                                    <img class="demo cursor" src="images/product/<?php echo $prd->picture ?>"
                                        style="width:100%" onclick="currentSlide(4)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <h3 class="text-center"><?php echo $prd->proname ?></h3>

                <h2 style="border-top:2px solid #101010;"class="col-md-6 "><?php echo $prd->price ?> ฿</h2>
                <div class="col-md-6 ">

                    <a href="#" id="rate1" value="1" name="comRate checked" style="color:#171717"><span
                            class="fa fa-star checked"></span></a>
                    <a href="#" id="rate2" value="2" name="comRate checked" style="color:#171717"><span
                            class="fa fa-star checked"></span></a>
                    <a href="#" id="rate3" value="3" name="comRate checked" style="color:#171717"><span
                            class="fa fa-star checked"></span></a>
                    <a href="#" id="rate4" value="4" name="comRate checked" style="color:#171717"><span
                            class="fa fa-star checked"></span></a>
                    <a href="#" id="rate5" value="5" name="comRate" style="color:#171717"><span
                            class="fa fa-star"></span></a>
                </div>

                <script>
                    function addOne() {
                        document.formadd.num.value++;
                        return;
                    }
                    function delOne() {
                        document.formadd.num.value--;
                        return;
                    }
                </script>
                <form action="insertorder.php" name="formadd" method="POST">
                    <select name="stock" class="form-control" id="">
                        <option value="<?php echo $prd->stockS ?>">Size S <?php echo $prd->stockS ?> ชิ้น</option>
                        <option value="<?php echo $prd->stockM ?>">Size M <?php echo $prd->stockM ?> ชิ้น</option>
                        <option value="<?php echo $prd->stockL ?>">Size L <?php echo $prd->stockL ?> ชิ้น</option>
                        <option value="<?php echo $prd->stockXL ?>">Size XL <?php echo $prd->stockXL ?> ชิ้น</option>

                    </select>
                    <div class="form-group col-xs-12" style="margin-top:20px">
                        <label class="col-xs-12">
                            <h3>จำนวน :</h3>
                        </label>
                        <input type="button" class="buttonn  btn btn-danger col-xs-2" value="-" onclick="delOne()">
                        <div class="col-xs-6"><input name="num" class="addnum form-control col-xs-8 " readonly
                                value="1"></input></div>

                        <input type="button" class="buttonn btn btn-success col-xs-2" value="+" onclick="addOne()">
                    </div>
                    <input type="hidden" name="hdnProductPrice" value="<?php echo $prd->price;?>">

                    <input type="hidden" name="hdnProductID" value="<?php echo $prd->id;?>">
                    <input type="hidden" name="hdnProductPic" value="<?php echo $prd->picture;?>">
                    <input type="hidden" name="hdnProductname" value="<?php echo $prd->proname;?>">
                    <input type="hidden" name="hdnUserID" value="<?php echo $_SESSION['id']?>">
                    <input type="hidden" name="hdnUsername" value="<?php echo $_SESSION['name']?>">
                    <button type="submit" class="btn btn-info btn-block btn-lg"> <i
                            class="glyphicon glyphicon-shopping-cart"></i> Add To Cart</button>
                </form>
                <h3 style="border-top:2px solid #101010;">รายละเอียด: </h3>
                <p><?php echo $prd->description ?> </p>
                <p>

                </p>
            </div>
            <div class="row">
            <h3 class=" col-md-12 col-sm-12 col-xs-12" style="border-top:2px solid #101010;color:#00d4be">Review</h3>
                        <?php
                                $proid=$prd->id;
                                    $sqlcom ="SELECT * FROM comment WHERE proid=$proid ";
                                    $resultcom = $conn->query($sqlcom);
                                     while($com = $resultcom->fetch_object()){
            ?>
                        <div class=" col-md-12 col-sm-12 col-xs-12">

                            <span>
                                <h4><?php echo $com->username; ?></h4><?php echo $com->date; ?>
                            </span>
                            <h4><?php echo $com->comment; ?></h4>
                            <hr style="color:#e5e5e5">
                        </div>
                        <?php
                    }
            ?>


                    <?php 
                                if($_SESSION['usertype']=='admin'){
                                    ?>
                    <div class="row">
                    <form action="commentProduct.php" method="post">
                        <input type="hidden" name="hdnProductID" value="<?php echo $prd->id;?>">
                        <input type="hidden" name="hdnUserID" value="<?php echo $_SESSION['id']?>">
                        <input type="hidden" name="hdnUserName" value="<?php echo $_SESSION['name']?>">
                        <input type="hidden" name="hdnUserType" value="<?php echo $_SESSION['usertype']?>">
                        <div class=" col-md-12 col-sm-12 col-xs-12" >
                            <h3 for=""> <i class="glyphicon glyphicon-comment"></i> Comment </h3>
                            <div>
                                <img src="images/imgUser/<?php echo $_SESSION['pic'] ?> " class="img-circle"
                                    style="width:50px;height:50px;margin-bottom:20px" alt=""> <span
                                    style="margin-bottom:20px"><?php echo $_SESSION['name']; ?></span>
                                    <div class=" col-md-10 col-sm-12 col-xs-12"><textarea class="form-control " id="commentArea" name="commentArea"placeholder="Required example textarea" required></textarea></div>
                                
                                <div class=" col-md-2 col-sm-12 col-xs-12" style="margin-top:10px"><button type="submit" class="btn btn-success btn-block btn-lg"> <i class="glyphicon glyphicon-pencil"></i> Comment</button></div>
                            </div>
                    </form>
                    </div>
                <?php
                                }
                                else if($_SESSION['usertype']== 'customer') {
                                    ?>
                <div class="row">
                    <form action="commentProduct.php" method="post">
                        <input type="hidden" name="hdnProductID" value="<?php echo $prd->id;?>">
                        <input type="hidden" name="hdnUserID" value="<?php echo $_SESSION['id']?>">
                        <input type="hidden" name="hdnUserName" value="<?php echo $_SESSION['name']?>">
                        <input type="hidden" name="hdnUserType" value="<?php echo $_SESSION['usertype']?>">
                        <div class=" col-md-12 col-sm-12 col-xs-12" >
                            <h3 for=""> <i class="glyphicon glyphicon-comment"></i> Comment </h3>
                            <div>
                                <img src="images/imgUser/<?php echo $_SESSION['pic'] ?> " class="img-circle"
                                    style="width:50px;height:50px;margin-bottom:20px" alt=""> <span
                                    style="margin-bottom:20px"><?php echo $_SESSION['name']; ?></span>
                                    <div class=" col-md-10 col-sm-12 col-xs-12"><textarea class="form-control " id="commentArea" name="commentArea"placeholder="Required example textarea" required></textarea></div>
                                
                                <div class=" col-md-2 col-sm-12 col-xs-12" style="margin-top:10px"><button type="submit" class="btn btn-success btn-block btn-lg"> <i class="glyphicon glyphicon-pencil"></i> Comment</button></div>
                            </div>
                    </form>
                   
                </div>
 <?php
                                }
                                else{
                                    error_reporting(~E_NOTICE);
                                }
                                
                                    ?>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#rate1").click(function () {
            $("a#rate1 span.fa.fa-star").addClass("checked");
            $("a#rate2 span.fa.fa-star").removeClass("checked");
            $("a#rate3 span.fa.fa-star").removeClass("checked");
            $("a#rate4 span.fa.fa-star").removeClass("checked");
            $("a#rate5 span.fa.fa-star").removeClass("checked");
        });
        $("#rate2").click(function () {
            $("a#rate1 span.fa.fa-star").addClass("checked");
            $("a#rate2 span.fa.fa-star").addClass("checked");
            $("a#rate3 span.fa.fa-star").removeClass("checked");
            $("a#rate4 span.fa.fa-star").removeClass("checked");
            $("a#rate5 span.fa.fa-star").removeClass("checked");
        });
        $("#rate3").click(function () {
            $("a#rate1 span.fa.fa-star").addClass("checked");
            $("a#rate2 span.fa.fa-star").addClass("checked");
            $("a#rate3 span.fa.fa-star").addClass("checked");
            $("a#rate4 span.fa.fa-star").removeClass("checked");
            $("a#rate5 span.fa.fa-star").removeClass("checked");
        });
        $("#rate4").click(function () {
            $("a#rate1 span.fa.fa-star").addClass("checked");
            $("a#rate2 span.fa.fa-star").addClass("checked");
            $("a#rate3 span.fa.fa-star").addClass("checked");
            $("a#rate4 span.fa.fa-star").addClass("checked");
            $("a#rate5 span.fa.fa-star").removeClass("checked");
        });
        $("#rate5").click(function () {
            $("a#rate1 span.fa.fa-star").addClass("checked");
            $("a#rate2 span.fa.fa-star").addClass("checked");
            $("a#rate3 span.fa.fa-star").addClass("checked");
            $("a#rate4 span.fa.fa-star").addClass("checked");
            $("a#rate5 span.fa.fa-star").addClass("checked");
        });

    });
</script>