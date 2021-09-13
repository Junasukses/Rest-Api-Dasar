<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/pabrik/api/api_tampil.php");
$data = json_decode($data, TRUE); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan Pabrik</title>
</head>
<body>
<h3>Data Karyawan</h3>
<a href="tambah.php">Tambah Karyawan</a><br>
<table border="1">
    
    <tr>
        <td>ID Karyawan</td>
        <td>Nama Karyawan</td>
        <td>Jenis Kelamin</td>
        <td>Lama Bekerja</td>
        <td>Gaji Karyawan</td>
        <td colspan="2">Aksi</td>
    </tr>
    <?php foreach($data as $data) {?>
    <tr>
        <td><?=$data['id']?></td>
        <td><?=$data['nama_karyawan']?></td>
        <td><?=$data['jenis_kelamin']?></td>
        <td><?=$data['lama_bekerja']?></td>
        <td><?=$data['gaji']?></td>
        <td><a href="edit.php?id=<?=$data['id']?>">Tinjau</a></td>
        <td><a href="../api/api_hapus.php?id=<?=$data['id']?>">Hapus</a></td>
    </tr>
    <?php } ?>
</table>           
</body>
</html>