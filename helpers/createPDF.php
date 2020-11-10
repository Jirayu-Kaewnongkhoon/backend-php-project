<?php
    require_once('../../vendor/autoload.php');

    function createPDF($row) {
        
        $reports = "
            <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center
            }
            </style>
            
            <h1>รายงานการแจ้งซ่อม</h1>
            <h2>ประจำเดือน กรกฏาคม ปี พ.ศ. 2563</h2>
            <table style='width:100%;'>
                <tr>
                    <th>รายการแจ้งซ่อม</th>
                    <th>สถานที่</th>
                    <th>วันที่แจ้ง</th>
                </tr>
                " . $row . "
            </table>
        ";

        // echo $reports;
    
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 14,
            'default_font' => 'Garuda'
        ]);

        $mpdf->WriteHTML($reports);
        $mpdf->Output('Reports '. date('Y-m-d H-i-s') .'.pdf', 'D');
    }
?>