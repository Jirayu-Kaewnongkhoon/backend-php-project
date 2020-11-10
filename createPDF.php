<?php
require_once __DIR__ . '/vendor/autoload.php';

$reports = '
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center
    }
    </style>
    
    <h1>รายงานการแจ้งซ่อม</h1>
    <h2>ประจำเดือน กรกฏาคม ปี พ.ศ. 2563</h2>
    <table style="width:100%;">
        <tr>
            <th>รายการแจ้งซ่อม</th>
            <th>สถานที่</th>
            <th>วันที่แจ้ง</th>
        </tr>
        <tr>
            <td>ไฟดับ</td>
            <td>อาคารพระจอม</td>
            <td>09/07/2020</td>
        </tr>
        <tr>
            <td>เก้าอี้แตก</td>
            <td>อาคารพระจอม</td>
            <td>15/07/2020</td>
        </tr>
        <tr>
            <td>ท่อน้ำรั่ว</td>
            <td>อาคารจุฬาภรณ์ 1</td>
            <td>19/07/2020</td>
        </tr>
        <tr>
            <td>พัดลมไม่ติด</td>
            <td>โรงอาหาร</td>
            <td>22/07/2020</td>
        </tr>
        <tr>
            <td>ไฟดับ</td>
            <td>อาคารจุฬาภรณ์ 2</td>
            <td>09/07/2020</td>
        </tr>
        <tr>
            <td>air</td>
            <td>อาคารจุฬาภรณ์ 1</td>
            <td>15/07/2020</td>
        </tr>
    </table>
';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 14,
	'default_font' => 'Garuda'
]);
$mpdf->WriteHTML($reports);
$mpdf->Output('Reports.pdf', 'D');
?>