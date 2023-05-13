<?php
class Member{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataMember(){
        $sql = "SELECT * FROM member;";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function cekLogin($data){
        $sql = "SELECT * FROM member WHERE username=? AND password=SHA1(MD5(SHA1(?)))";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
    public function setMember($data){
        $sql = "INSERT INTO member (fullname, username, password, role, foto) VALUES (?, ?, ?, ?, ?)";
        $password = sha1(md5(sha1($data[2])));
        $role = in_array($data[3], ['manager', 'admin', 'staff']) ? $data[3] : 'staff';
        $ps = $this->koneksi->prepare($sql);
        $success = $ps->execute([$data[0], $data[1], $password, $role, $data[4]]);
        if ($success) {
        return ['success' => true];
        } else {
        $error = $ps->errorInfo();
        return ['success' => false, 'message' => $error[2]];
        }
    }
}
?>