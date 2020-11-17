<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    require_once('../../vendor/autoload.php');

    function createPDF($row) {
        
        $font = "<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\"> <link href=\"https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap\" rel=\"stylesheet\">";

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
                
                .datetime {
                    font-size: 20px;
                }
            </style>
            
            <body>
                <h1 class=\"header\">
                    รายงานการแจ้งซ่อม
                </h1>
                <h2 class=\"datetime\">
                    พิมพ์วันที่: ". date('d/m/Y') ." เวลา: ". date('H:i:s') ."
                </h2>
                <table style='width:100%;'>
                    <thead>
                        <tr>
                            <th>รายการแจ้งซ่อม</th>
                            <th>สถานที่</th>
                            <th>วันที่แจ้ง</th>
                        </tr>
                    </thead>
                    <tbody>
                        " . $row . "
                    <tbody>
                </table>
            </body>
        ";

        // echo $reports;
    
        $mpdf = new \Mpdf\Mpdf(/* [
            'default_font_size' => 14,
            'default_font' => 'Garuda'
        ] */);

        $mpdf->WriteHTML($reports);
        $mpdf->Output('Reports '. date('Y-m-d H-i-s') .'.pdf', 'D');
    }
?>