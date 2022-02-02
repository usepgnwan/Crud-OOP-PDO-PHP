<!DOCTYPE html>
<html lang="en">
<?php
require('class/user.php');
require('class/jabatan.php');
require('config/koneksi.php');

// session_start();
// $username = $_SESSION['username'];


$usr = new User($db);
$listKrw = $usr->listKaryawan();
$listUser = $usr->listUser();
$jbt = new Jabatan($db);
$listJbt = $jbt->listJabatan();
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row mt-3">

            <div class="col-md-4">
                <div class="card mb-3 widget-content">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tambah Jabatan</h5>
                        <p class="card-text text-center">
                            <span><i class="fas fa-list fa-5x"></i></span>
                        </p>
                        <a href="view/jabatan/jabatan.php" class="btn btn-primary">tambah</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-content">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tambah User</h5>
                        <p class="card-text text-center">
                            <span><i class="fas fa-users fa-5x"></i>
                            </span>
                        </p>
                        <a href="javascript:void(0)" class="btn btn-primary btn-user-add">tambah</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4  ">
                <div class="card mb-3 widget-content">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tentukan Atasan</h5>
                        <p class="card-text text-center">
                            <span><i class="fas fa-user fa-5x"></i></span>
                        </p>
                        <a href="javascript:void(0)" class="btn btn-primary btn-user-atasan">tambah</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2" id="card-tambah-user" hidden>
                <div class="card ">
                    <h5 class="card-header">Tambah User </h5>
                    <div class="card-body">
                        <form action="view/user/insert.php" method="post">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="input" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="input" class="form-control" id="fullNameUser" name="fullNameUser" placeholder="fullname">
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select class="form-control" name="genderUser">
                                    <option value="Male">Male</option>
                                    <option value="FeMale">FeMale</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" id="addressUser" name="addressUser" placeholder="address"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select class="form-control" name="idJabatan">
                                    <?php foreach ($listJbt as $jbt) : ?>
                                        <option value="<?= $jbt['idJabatan']; ?>"><?= $jbt['namaJabatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" name="simpan_user" value="Simpan User">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2" id="card-user-atasan" hidden>
                <div class="card ">
                    <h5 class="card-header">Tentukan Atasan User</h5>
                    <div class="card-body">
                        <form action="view/user/insertAtasan.php" method="post">
                            <div class="form-group">
                                <label for="">User</label>
                                <select class="form-control" name="usernameBawahan">
                                    <?php foreach ($listUser as $user) : ?>
                                        <option value="<?= $user['username']; ?>"><?= $user['username']; ?> - <?= $user['fullNameUser']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Atasan</label>
                                <select class="form-control" name="usernameSuperior">
                                    <?php foreach ($listUser as $user) : ?>
                                        <option value="<?= $user['username']; ?>"><?= $user['username']; ?> - <?= $user['fullNameUser']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" name="simpan_user_atasan" value="Simpan User">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <div class="card ">
                    <h5 class="card-header">List Karyawan</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Atasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($listKrw as $krw) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $krw['username']; ?></td>
                                        <td><?= $krw['fullname']; ?></td>
                                        <td><?= $krw['addressUser']; ?></td>
                                        <td><?= $krw['namaJabatan']; ?></td>
                                        <td><?= $krw['atasan'] == '' || null ? '-' : $krw['atasan']; ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

<script>
    $('.btn-user-add').click(function() {
        $('#card-tambah-user').prop('hidden', false);
        $('#card-user-atasan').prop('hidden', true);
    });

    $('.btn-user-atasan').click(function() {
        $('#card-user-atasan').prop('hidden', false);
        $('#card-tambah-user').prop('hidden', true);
    });
</script>

</html>