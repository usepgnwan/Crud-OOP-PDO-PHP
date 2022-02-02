<?php

require('../../class/jabatan.php');
require('../../config/koneksi.php');


$jbt = new Jabatan($db);
if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete = $jbt->deleteid($id);
    if ($delete = "success") {
        header('Location: jabatan.php');
    }
}
