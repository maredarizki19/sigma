<?php
class barang
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

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_barang, 4, 2)),0)+1 as kode from barang");
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

        if ($kode > 0 && $kode < 10)
        {
            $kodekat = "B"."00".$kode;
        }
        else if ($kode >9 && $kode < 100)
        {
            $kodekat = "B"."0".$kode;
        }
        else if ($kode >99 && $kode < 1000)
        {
            $kodekat = "B".$kode;
        }

        return $kodekat;
    }

    public function add_data($kd_barang, $kd_kategori, $nm_barang, $foto, $deskripsi, $stock)
    {
        $data = $this->db->prepare('INSERT INTO barang (kd_barang, kd_kategori, nm_barang, foto, deskripsi, stock) VALUES (?, ?, ?, ?, ?, ?)');

        $data->bindParam(1, $kd_barang);
        $data->bindParam(2, $kd_kategori);
        $data->bindParam(3, $nm_barang);
        $data->bindParam(4, $foto);
        $data->bindParam(5, $deskripsi);
        $data->bindParam(6, $stock);
        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * from barang");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_barang){
        $query = $this->db->prepare("SELECT * from barang where kd_barang=?");
        $query->bindParam(1, $kd_barang);
        $query->execute();
        return $query->fetch();
    }

    public function update($kd_barang, $kd_kategori, $nm_barang, $foto, $deskripsi, $stock){
        $query = $this->db->prepare('UPDATE barang set nm_barang=?, kd_kategori=?, foto=?, deskripsi=?, stock=? where kd_barang=?');
        //padahal di setnya nomer 2 kd barang, jadi yg bener mana? bingung akutu #codingsays
        $query->bindParam(1, $nm_barang);
        $query->bindParam(2, $kd_kategori); //disini no 2 isinya kd kategori
        $query->bindParam(3, $foto);
        $query->bindParam(4, $deskripsi);
        $query->bindParam(5, $stock);
        $query->bindParam(6, $kd_barang);
        $query->execute();
        return $query->rowCount();
    }
    public function delete($kd_barang){
       $query = $this->db->prepare('delete from barang where kd_barang=?');

       $query->bindParam(1, $kd_barang);

       $query->execute();
       return $query->rowCount();
   }
}
?>
