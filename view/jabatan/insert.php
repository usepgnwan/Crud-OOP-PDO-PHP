<?php
require('../../class/jabatan.php');
require('../../config/koneksi.php');


$jbt = new Jabatan($db);

if (isset($_POST['simpan_jbt'])) {

    $jabatan = $_POST['jabatan'];
    $save = $jbt->tambah($jabatan);
    if ($save == "Sukses") {
        print "<script>alert('Jabatan Berhasil Disimpan');
        window.location.href = 'jabatan.php';
              </script>";
    } else {
        print "<script>alert('Jabatan Gagal Disimpan');
                javascript:history.go(-2);</script>";
        exit();
    }
}
