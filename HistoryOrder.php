<?php
        include("connect.php");
        $userid = $_GET['uid'];
        $sql ="SELECT * FROM ordercheckout WHERE userid=$userid";
        $result = $conn->query($sql);
        $prd = $result->fetch_object();
        $n=1;
        if($prd->status== 1){
            $stt="ชำระเงินแล้ว";
        }
        else{
            $stt="ยังไม่ได้ชำระเงิน";
       } 
?>
<style>

        table {
            border-collapse: collapse;
            width: 100%;
            font-size:12pt;
            border: 1px solid #dddddd;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
         
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            border: 1px solid #fff;
        }
        .trr{
            text-align: center;
            border: 1px solid #dddddd;
        }
</style>
        <div class="container">
        <div class="row">
        <h2>การซื้อของฉัน</h2>
            <table>
                <tr>
                    <th>ลำดับ</th>
                    <th>วันที่</th>
                    <th>จำนวนเงิน</th>
                    <th>สถานะการชำระเงิน</th>
                </tr>
                <?php
        $sql ="SELECT * FROM ordercheckout WHERE userid=$userid";
        $result = $conn->query($sql);
                      
        while($prd = $result->fetch_object()){
?>
                <tr>
                    <td><?php echo $n ?></td>
                    <td><?php echo $prd->Date  ?></td>
                    <td><?php echo $prd->totalAll  ?></td>
                    <td><?php echo $stt  ?></td>
                </tr>

                <?php
                $n++;
        }
?>
            </table>
        </div>
        </div>