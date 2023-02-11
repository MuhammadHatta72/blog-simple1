<?php
include './koneksi.php';
include './assets/vendor/autoload.php'; //jika versi mPDFnya versi 7

$query = "SELECT pengguna.nama as nama_pengguna, makanan_properti.nama as nama_item, makanan_properti.jenis as jenis, transaksi.tanggal, transaksi.status_bayar, transaksi.bayar, transaksi.bukti FROM transaksi LEFT JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna JOIN makanan_properti ON transaksi.id_makanan_properti = makanan_properti.id_makanan_properti";
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
    <title>Laporan Daftar Transaksi Pembelian</title>
    <link rel="stylesheet" href="css/print.css"
</head>
<body>
    <h1 style="text-align: center;"> DAFTAR TRANSAKSI PEMBELIAN</h1>
    <h2 style="text-align: center;">PETCATSHOP (PUSAT KEBUTUHAN KUCING TERLENGKAP)</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Bayar</th>
            <th>Bukti</th>
        </tr>';
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
            <td>' . $i . '</td>
            <td>' . $row["nama_pengguna"] . '</td>
            <td>' . $row["nama_item"] . '</td>
            <td>' . $row["jenis"] . '</td>
            <td>' . $row["tanggal"] . '</td>
            <td>' . $row["status_bayar"] . '</td>
            <td>' . $row["bayar"] . '</td>
            <td> <img src="./assets/imgBukti/' . $row['bukti'] . '" height="100" width="100"/> </td>
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
$mpdf->Output('Laporan Daftar Transaksi Pembelian.pdf', 'I');
