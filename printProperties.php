<?php
include './koneksi.php';
include './assets/vendor/autoload.php'; //jika versi mPDFnya versi 7

$query = "SELECT * FROM makanan_properti WHERE jenis = 'Properti'";
$result = mysqli_query($kon, $query);
// $mpdf = new \Mpdf\Mpdf();//jika versi mPDFnya versi 7
$mpdf = new \mPDF('utf-8', 'A4-L', ''); //karena versi dari mPdfnya versi 6

//perlu diingat mPDF ini kita akan bermain dengan string
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Daftar Properti Kucing</title>
    <link rel="stylesheet" href="css/print.css"
</head>
<body>
    <h1 style="text-align: center;"> DAFTAR PROPERTI KUCING</h1>
    <h2 style="text-align: center;">PETCATSHOP (PUSAT KEBUTUHAN KUCING TERLENGKAP)</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
        </tr>';
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
            <td>' . $i . '</td>
            <td> <img src="./assets/imgProperti/' . $row['gambar'] . '" height="100" width="100"/> </td>
            <td>' . $row["nama"] . '</td>
            <td>' . $row["harga"] . '</td>
            <td>' . $row["stok"] . '</td>
            <td>' . $row["deskripsi"] . '</td>
            </tr>';
    $i++;
}
// .= artinya menggabungkan 2 string sebelumnya dan string sesudahnya 
$html .= '</table>
</body>
</html>
';
$mpdf->WriteHTML($html);
// $filename = $filename . ".pdf"; //You might be not adding the extension, 
$mpdf->Output('Laporan Daftar Properti Kucing.pdf', 'I');
