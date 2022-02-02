<!DOCTYPE html>
<html lang="en">
<?php
require('../../class/jabatan.php');
require('../../config/koneksi.php');


$jbt = new Jabatan($db);
$listJbt = $jbt->listJabatan();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../assets/css/bootstrap.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="col-md-12 mt-2">
            <a href="../../index.php" type="button" class="btn mr-2 btn-primary "><i class="fa fa-home"></i></a>
            <button type="button" class="btn btn-primary add-jbt">Tambah Jabatan</button>
        </div>
        <div class="col-md-12 mt-2" id="card-tambah" hidden>
            <div class="card ">
                <h5 class="card-header">Tambah Jabatan </h5>
                <div class="card-body">
                    <form action="insert.php" method="post">
                        <div class="form-group">
                            <label for="">Nama Jabatan</label>
                            <input type="input" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan">
                        </div>
                        <input type="submit" class="btn btn-primary" name="simpan_jbt" value="Simpan Jabatan"></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-2">
            <div class="card ">
                <h5 class="card-header">List Jabatan</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jabatan</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($listJbt as $jbt) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $jbt['namaJabatan']; ?></td>
                                    <td><a href="delete.php?delete_id=<?= $jbt['idJabatan']; ?>" class="btn btn-danger"> <span><i class="fa fa-trash"></i></span></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('.add-jbt').click(function() {
        $('#card-tambah').prop('hidden', false);
    })
</script>

</html>