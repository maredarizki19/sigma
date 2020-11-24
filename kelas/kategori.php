<?php
class kategori
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "iphone";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function createCode()
    {
        $kode = 0;
        $kodekat = "";

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_kategori, 2, 2)),0)+1 as kode from kategori");
        $query ->execute();
        $data = $query->fetch();

        if ($data['kode']=="")
        {
            $kode=0;
        }
        else
        {
            $kode = $data['kode'];
        }

        if ($kode > 0 && $kode < 9)
        {
            $kodekat = "K"."0".$kode;
        }
        else if ($kode >=9 && $kode < 99)
        {
            $kodekat = "K".$kode;
        }

        return $kodekat;
    }

    public function add_data($kd_kategori, $nm_kategori)
    {
        $data = $this->db->prepare('INSERT INTO kategori (kd_kategori,nm_kategori) VALUES (?, ?)');

        $data->bindParam(1, $kd_kategori);
        $data->bindParam(2, $nm_kategori);
        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * from kategori");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_kategori){
        $query = $this->db->prepare("SELECT * from kategori where kd_kategori=?");
        $query->bindParam(1, $kd_kategori);
        $query->execute();
        return $query->fetch();
    }

    public function update($kd_kategori,$nm_kategori){
        $query = $this->db->prepare('UPDATE kategori set nm_kategori=? where kd_kategori=?');

        $query->bindParam(1, $nm_kategori);
        $query->bindParam(2, $kd_kategori);

        $query->execute();
        return $query->rowCount();
    }
    public function delete($kd_kategori){
       $query = $this->db->prepare('delete from kategori where kd_kategori=?');

       $query->bindParam(1, $kd_kategori);

       $query->execute();
       return $query->rowCount();
   }
}
?>
