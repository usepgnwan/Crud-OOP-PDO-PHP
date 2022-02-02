<?php
require('../../class/user.php');
require('../../config/koneksi.php');


$usr = new User($db);

if (isset($_POST['simpan_user_atasan'])) {

    $usernameBawahan = $_POST['usernameBawahan'];
    $usernameSuperior = $_POST['usernameSuperior'];
    $save = $usr->tambahAtasan($usernameBawahan, $usernameSuperior);
    if ($save == "Sukses") {
        print "<script>alert('User Atasan Berhasil Disimpan'); 
        window.location.href = '../../index.php'; </script>";
    } else {
        print "<script>alert('User Gagal Disimpan');
                javascript:history.go(-2);</script>";
        exit();
    }
}
