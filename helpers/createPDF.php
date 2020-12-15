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
                " . $font ."
            </head>

            <style>
                body {
                    font-family: 'Sarabun', sans-serif;
                    padding: 10px 30px 10px 30px;
                }

                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
                
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                
                .detail {
                    font-size: 20px;
                }
            </style>
            
            <body>
                <h1 class=\"header\">
                    รายงานการแจ้งซ่อม ประจำเดือน ". getMonth($month) ."
                </h1>
                <h2 class=\"detail\">
                    พิมพ์วันที่: ". date('d/m/Y') ." เวลา: ". date('H:i:s') ." น.
                </h2>
                <h2 class=\"detail\">
                    ออกโดย: ". $user_name ."
                </h2>
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
                        " . $row . "
                    <tbody>
                </table>
            </body>
        ";

        echo $reports;
    
        // // Instantiate Mpdf Object
        // $mpdf = new \Mpdf\Mpdf();

        // // Write PDF file with HTML
        // $mpdf->WriteHTML($reports);

        // // Save PDF file with force download 
        // $mpdf->Output('Reports '. date('Y-m-d H-i-s') .'.pdf', 'D');
    }
?>