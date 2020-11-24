<?php
class pelanggan
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

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_pelanggan, 2, 2)),0)+1 as kode from pelanggan");
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
            $kodekat = "P"."0".$kode;
        }
        else if ($kode >=9 && $kode < 99)
        {
            $kodekat = "K".$kode;
        }

        return $kodekat;
    }

    public function add_data($kd_pelanggan, $nm_pelanggan, $alamat, $telp, $email) //disini ada 5 parameter
    {
        $data = $this->db->prepare('INSERT INTO pelanggan (kd_pelanggan, nm_pelanggan, alamat, telp, email) VALUES (?, ?, ?, ?, ?)'); //kenapa disini tanda tanya nya cuma 2 tadi ?

        $data->bindParam(1, $kd_pelanggan);
        $data->bindParam(2, $nm_pelanggan);
        $data->bindParam(3, $alamat);
        $data->bindParam(4, $telp);
        $data->bindParam(5, $email); //padahal ini bindparam juga 5, sistemnya bingung dia, mau execute 2 atau 5
        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * from pelanggan");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_pelanggan){
        $query = $this->db->prepare("SELECT * from pelanggan where kd_pelanggan=?");
        $query->bindParam(1, $kd_pelanggan);
        $query->execute();
        return $query->fetch();
    }

    public function update($kd_pelanggan, $nm_pelanggan, $alamat, $telp, $email){ //kenapa disni pake parameternya 5 ? alo cuma 1 yg diubah ? kan mubazir, sedih lho kalo ga dianggep parameternya
        $query = $this->db->prepare('UPDATE pelanggan set nm_pelanggan=?, alamat=?, telp=?, email=? where kd_pelanggan=?'); //urutan tanda tanya disini menunjukan urutan di bindparamnya
        //ini yg bisa diubah cuma nama pelanggan doang ?
        $query->bindParam(1, $nm_pelanggan);
      //  $query->bindParam(2, $kd_pelanggan); //nah kan naruhnya salah lagi
        $query->bindParam(2, $alamat);
        $query->bindParam(3, $telp);
        $query->bindParam(4, $email);
        $query->bindParam(5, $kd_pelanggan); //kode ditaruh paling akhir zeyenk, biar hidupnya ga kebanyakan kode2an
        //tau nggak kenapa ditaruh paling akhir? kodenya

        $query->execute();
        return $query->rowCount();
    }
    public function delete($kd_pelanggan){
       $query = $this->db->prepare('delete from pelanggan where kd_pelanggan=?');

       $query->bindParam(1, $kd_pelanggan);

       $query->execute();
       return $query->rowCount();
   }
}
?>
