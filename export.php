<?php

    include("connect.php");
    require_once "vendor/autoload.php";

        // เพิ่ม Font ให้กับ mPDF
    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    $mpdf = new \Mpdf\mpdf(['tempDir' => '/tmp',
        'fontdata' => $fontData + [
                'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
                    'R' => 'Sarabun-Regular.ttf',
                    'I' => 'Sarabun-Italic.ttf',
                    'B' =>  'Sarabun-Bold.ttf',
                    'BI' => "Sarabun-BoldItalic.ttf",
                ]
            ],
        //ทำให้กระดาษเป็นแนวนอน
        'format'=> 'A4-L'
    ]);

    ob_start();

    
?>

    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        .report{
            font-family:sarabun;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-size:12pt;
            font-family:sarabun;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
         
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            
        }
        .trr{
            text-align: center;
           
        }
    </style>
<div class="report">
    <h1>รายการสินค้าทั้งหมด </h1><span><?php echo date('d/m/Y')  ?></span>
    <table border="1">
        <tr >
            <td class="trr">รหัสสินค้า</td>
            <td class="trr">ชื่อสินค้า</td>
            <td class="trr">ประเภทสินค้า</td>
            <td class="trr">ราคา</td>
            <td class="trr">คงเหลือ ไซส์ S</td>
            <td class="trr">คงเหลือ ไซส์ M</td>
            <td class="trr">คงเหลือ ไซส์ L</td>
            <td class="trr">คงเหลือ ไซส์ XL</td>

        </tr>
        <?php
                 $sql ="SELECT * FROM product ORDER BY id ASC ";
                 $result = $conn->query($sql);
            
                while($prd = $result->fetch_object()){
            ?>
        <tr>
            <td><?php echo $prd->id; ?></td>
            <td><?php echo $prd->proname ?></td>
            <td><?php echo $prd->protype ?></td>
            <td><?php echo $prd->price ?></td>
            <td><?php echo $prd->stockS ?></td>
            <td><?php echo $prd->stockM ?></td>
            <td><?php echo $prd->stockL ?></td>
            <td><?php echo $prd->stockXL ?></td>
        </tr>
            <?php
                    }
            ?>
    </table>
</div>
<?php
        $html = ob_get_contents(); // ทำการเก็บค่า HTML จากคำสั่ง ob_start()
        //$mpdf = new \Mpdf\mpdf();
        $mpdf->writeHTML($html); // ทำการสร้าง PDF ไฟล์

        $mpdf->Output("Stock.pdf"); // ให้ทำการบันทึกโค้ด HTML เป็น PDF โดยบันทึกเป็นไฟล์ชื่อ MyPDF.pdf
        ob_end_flush()
?>
    ดาวน์โหลดรายงานในรูปแบบ PDF <a href="Stock.pdf" target="_blank"> Click</a>