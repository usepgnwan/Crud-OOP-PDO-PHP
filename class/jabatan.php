<?php
class Jabatan
{
    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }

    public function listJabatan()
    {

        $result = $this->db->Prepare('SELECT * FROM `tbjabatan` ');
        // $result->BindParam(1, $username);
        $result->execute();
        $rows = $result->FetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function deleteid($id)
    {
        $result = $this->db->prepare('DELETE FROM tbjabatan where idJabatan=?');
        $result->BindParam('1', $id);
        $result->execute();

        if ($result) {
            return "success";
        }
    }
    public function tambah($jabatan)
    {

        $result = $this->db->prepare("INSERT INTO tbjabatan(namaJabatan) VALUES (?)");
        $result->bindParam(1, $jabatan);
        $result->execute();
        if (!$result) {
            return "Gagal";
        } else {
            return "Sukses";
        }
    }
}
