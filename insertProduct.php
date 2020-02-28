<?php
    include("connect.php");
?>
    <div class="container">
        <div class="row">
            <form action="saveproduct.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">ชื่อสินค้า: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtname" id=""class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">รายละเอียดสินค้า: </label>
                    <div class="col-md-9">
                        <input type="text-area" name="txtdescription" id=""class="form-control"  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">ราคา: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtprice" id=""class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                        <span class="col-md-3 control-label">ประเภทสินค้า:</span>
                            <div class="col-md-9 ">
                                <input type="radio" id="pro1" name="protype" value="ยืด" checked>
                                    <label for="male">เสื้อยืด</label>
                                <input type="radio" id="pro2" name="protype" value="เชิ้ต">
                                    <label for="female">เสื้อเชิ้ต</label>
                                <input type="radio" id="pro3" name="protype" value="โปโล">
                                    <label for="other">เสื้อโปโล</label>
                                <input type="radio" id="pro4" name="protype" value="กันหนาว">
                                    <label for="other">เสื้อกันหนาว</label>
                                <input type="radio" id="pro5" name="protype" value="สูท">
                                    <label for="other">เสื้อสูท</label>
                                <input type="radio" id="pro6" name="protype" value="ขาสั้น">
                                    <label for="other">กางเกงขาสั้น</label>
                                <input type="radio" id="pro7" name="protype" value="ชิโน">
                                    <label for="other">กางเกงชิโน</label>
                                <input type="radio" id="pro8" name="protype" value="ยีนส์">
                                    <label for="other">กางเกงยีนส์</label>
                                <input type="radio" id="pro9" name="protype" value="ว่ายน้ำ">
                                    <label for="other">กางเกงว่ายน้ำ</label>
                                </div>
                          
						<span class="focus-input100" data-symbol=""></span>
					</div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">StockS: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtstocks" id=""class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">StockM: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtstockm" id=""class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">StockL: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtstockl" id=""class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">StockXL: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtstockxl" id=""class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Picture: </label>
                    <div class="col-md-9">
                    <!--หากจะอัปโหลดไฟล์จะต้องใส่ type ใน input เป็น file-->
                    <!--accept="image/*" สำหรับกำหนดว่าไฟล์ที่อัปโหลดเป็นไฟล์รูปภาพที่มีนามสกุลอะไรก็ได้-->
                        <input type="file" name="filepic" id=""class="form-control-file" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>