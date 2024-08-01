<?php
$koneksi = new mysqli('localhost', 'root', '', 'marcell_xipplg2') 
or die(mysqli_error($koneksi));

// Menyimpan data
if (isset($_POST['simpan'])) {
    $idpasien = $_POST['idpasien'];
    $nmpasien = $_POST['nmpasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("INSERT INTO pasien (idpasien, nmpasien, jk, alamat) VALUES ('$idpasien', '$nmpasien', '$jk', '$alamat')");

    header('Location: pasien.php');
    exit();
}

// Menghapus data
if (isset($_GET['idpasien'])) {
    $idpasien = $_GET['idpasien'];
    $koneksi->query("DELETE FROM pasien WHERE idpasien = '$idpasien'");
    header("Location: pasien.php");
    exit();
}

// Mengedit data
if (isset($_POST['edit'])) {
    $idpasienLama = $_POST['idpasienLama'];
    $idpasienBaru = $_POST['idpasienBaru'];
    $nmpasien = $_POST['nmpasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Ubah ID pasien lama menjadi ID pasien baru
    $koneksi->query("UPDATE pasien SET idpasien='$idpasienBaru', nmpasien='$nmpasien', jk='$jk', alamat='$alamat' WHERE idPasien='$idPasienLama'");
    header("Location: pasien.php");
exit();
}

?>