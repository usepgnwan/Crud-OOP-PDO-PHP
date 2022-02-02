<?php
require('../../class/user.php');
require('../../config/koneksi.php');


$usr = new User($db);

if (isset($_POST['simpan_user'])) {

    $username = $_POST['username'];
    $fullNameUser = $_POST['fullNameUser'];
    $genderUser = $_POST['genderUser'];
    $addressUser = $_POST['addressUser'];
    $idJabatan = $_POST['idJabatan'];
    $expName = explode(' ', $fullNameUser);
    $pass = strtoupper($expName[0]) . 'GISTEX';
    $pass = md5($pass);
    // var_dump($_POST);
    // die;
    $save = $usr->tambah($username, $fullNameUser, $genderUser, $pass, $addressUser, $idJabatan);
    if ($save == "Sukses") {
        print "<script>alert('User Berhasil Disimpan'); 
        window.location.href = '../../index.php'; </script>";
    } else {
        print "<script>alert('User Gagal Disimpan');
                javascript:history.go(-2);</script>";
        exit();
    }
}
