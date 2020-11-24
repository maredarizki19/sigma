<?php
class pengguna
{
  public function get_by_userpass($username, $password)
    {
      $query = $this->db->prepare("SELECT * FROM pengguna where username=? and  password=?");
      $query->bindParam(1, $username);
      $query->bindParam(2, $password);
      $query->execute();
      return $query->fetch();
    }

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

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_pengguna, 2, 2)),0)+1 as kode from pengguna");
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
            $kodekat = "P".$kode;
        }

        return $kodekat;
    }

    public function add_data($kd_pengguna, $username, $password, $level)
    {
        $data = $this->db->prepare('INSERT INTO pengguna (kd_pengguna, username, password, level) VALUES (?, ?, ?, ?)');

        $data->bindParam(1, $kd_pengguna);
        $data->bindParam(2, $username);
        $data->bindParam(3, $password);
        $data->bindParam(4, $level);
        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * from pengguna");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_pengguna){
        $query = $this->db->prepare("SELECT * from pengguna where kd_pengguna=?");
        $query->bindParam(1, $kd_pengguna);
        $query->execute();
        return $query->fetch();
    }

    public function update($kd_pengguna, $username, $password, $level){
        $query = $this->db->prepare('UPDATE pengguna set username=?, password=?, level=? where kd_pengguna=?');

        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->bindParam(3, $level);
        $query->bindParam(4, $kd_pengguna);
        $query->execute();
        return $query->rowCount();
    }
    public function delete($kd_pengguna){
       $query = $this->db->prepare('delete from pengguna where kd_pengguna=?');

       $query->bindParam(1, $kd_pengguna);

       $query->execute();
       return $query->rowCount();
   }
}
?>
