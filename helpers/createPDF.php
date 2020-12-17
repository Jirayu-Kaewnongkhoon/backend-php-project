<?php
    require_once('../../vendor/autoload.php');
    include('../../helpers/month.php');

    function createPDF($row, $month, $user_name) {
        
        $font = "
            <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\"> 
            <link href=\"https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap\" rel=\"stylesheet\">
        ";

        $reports = "
            <head>
                ". $font ."
            </head>

            <style>
                body {
                    font-family: 'Sarabun', sans-serif;
                    padding: 10px 30px 10px 30px;
                    border: 1px solid black;
                    display: flex;
                    flex-direction: column;
                }
                
                .header {
                    text-align: center;
                }

                .header > h1 {
                    font-size: 18px;
                }
                
                .detail {
                    display: flex;
                    justify-content: space-between;
                }

                .detail > h2 {
                    font-size: 16px;
                }

                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
            </style>
            
            <body>

                <div class=\"header\">

                    <img src=\"../../constant/Logo.png\" width='15%'/>

                    <h3>
                        FIX ME : ระบบแจ้งปัญหาการชำรุดของอุปกรณ์
                    </h3>

                    <h3>
                        รายงานการแจ้งซ่อม ประจำเดือน ". getMonth($month) ."
                    </h3>
                </div>

                <div class=\"detail\">
                    <h4>
                        พิมพ์โดย : ". $user_name ."
                    </h4>

                    <h4>
                        วันที่พิมพ์ : ". date('d/m/Y') ." เวลา : ". date('H:i:s') ." น.
                    </h4>
                </div>

                <hr style='width: 100%; margin-bottom: 20px;'>

                <table style='width:100%;'>
                    <thead>
                        <tr>
                            <th>รายการแจ้งซ่อม</th>
                            <th>สถานที่</th>
                            <th>วันที่แจ้ง</th>
                            <th>สถานะงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        ". $row ."
                    <tbody>
                </table>

            </body>
        ";

        // echo $reports;
    
        // Instantiate Mpdf Object
        $mpdf = new \Mpdf\Mpdf();

        // Write PDF file with HTML
        $mpdf->WriteHTML($reports);

        // Save PDF file with force download 
        $mpdf->Output('Reports '. date('Y-m-d H-i-s') .'.pdf', 'D');
    }
?>