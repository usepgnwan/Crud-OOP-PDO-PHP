<?php
class User
{
    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }

    public function listKaryawan()
    {

        $result = $this->db->Prepare('
        SELECT  tbuser.username , tbuser.fullNameUser as fullname,tbuser.genderUser,tbuser.addressUser, bwh.fullNameUser as atasan , tbjabatan.namaJabatan
        FROM 
         tbsuperior 
        RIGHT JOIN tbuser ON tbsuperior.usernameBawahan = tbuser.username 
        LEFT JOIN tbuser as bwh on bwh.username = tbsuperior.usernameSuperior
        JOIN tbjabatan on tbuser.idJabatan = tbjabatan.idJabatan
         ');
        // $result->BindParam(1, $username);
        $result->execute();
        $rows = $result->FetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function tambah($username, $fullNameUser, $genderUser, $password, $addressUser, $idJabatan)
    {
        $result = $this->db->prepare("INSERT INTO tbuser(username, fullNameUser, genderUser, password, addressUser, idJabatan) VALUES (?,?,?,?,?,?)");
        $result->bindParam(1, $username);
        $result->bindParam(2, $fullNameUser);
        $result->bindParam(3, $genderUser);
        $result->bindParam(4, $password);
        $result->bindParam(5, $addressUser);
        $result->bindParam(6, $idJabatan);
        $result->execute();
        if (!$result) {
            return "Gagal";
        } else {
            return "Sukses";
        }
    }

    public function listUser()
    {

        $result = $this->db->Prepare('SELECT * FROM tbuser');
        // $result->BindParam(1, $username);
        $result->execute();
        $rows = $result->FetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function tambahAtasan($usernameBawahan, $usernameSuperior)
    {
        $result = $this->db->prepare("INSERT INTO tbsuperior(usernameBawahan, usernameSuperior) VALUES (?,?)");
        $result->bindParam(1, $usernameBawahan);
        $result->bindParam(2, $usernameSuperior);
        $result->execute();
        if (!$result) {
            return "Gagal";
        } else {
            return "Sukses";
        }
    }
}
