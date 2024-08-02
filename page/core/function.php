<?php

class Database {
    public $db;

    public function __construct() {
        $this->db = mysqli_connect("localhost", "root", "", "learning");
    }

    public function query($query) {
        $result = mysqli_query($this->db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    // Add methods for other operations...

    public function closeConnection() {
        mysqli_close($this->db);
    }
}
class Article{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addArticle($_post){
        global $db;
        $judul = htmlspecialchars($_post["judul"]);
        $penulis = htmlspecialchars($_post["penulis"]);
        $pembuka = htmlspecialchars($_post["pembuka"]);
        $p1 = htmlspecialchars($_post["p1"]);
        $p2 = htmlspecialchars($_post["p2"]);
        $p3 = htmlspecialchars($_post["p3"]);
        $kesimpulan = htmlspecialchars($_post["kesimpulan"]);
        $sumber = htmlspecialchars($_post["sumber"]);
        $penutup = htmlspecialchars($_post["penutup"]);
        $status = "Butuh Approvel";
        $data_query = "INSERT INTO article VALUE
        (NULL, '$judul', '$penulis', '$pembuka', '$p1', '$p2', '$p3', '$kesimpulan', '$sumber', '$penutup', '$status')";
        mysqli_query($this->db, $data_query);
        return mysqli_affected_rows($this->db);
    }

    public function addComment($data_post){
        global $db;
        $nama = htmlspecialchars($data_post["nama"]);
        $isi_comment = htmlspecialchars($data_post["isi_comment"]);
        $data_query = "INSERT INTO komentar VALUE
        (NULL, '$nama', '$isi_comment')";
        mysqli_query($this->db, $data_query);
        return mysqli_affected_rows($this->db);
    }
}
class Profile{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function addAdmin($post){
        global $db;
        $nama = htmlspecialchars($post["nama"]);
        $email = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);
        $img = "default.png";
        $role = "Admin";
        $query_fetch_name = mysqli_query($this->db, "SELECT * FROM data_admin WHERE nama = '$nama'");
        $query_fetch_mail = mysqli_query($this->db, "SELECT * FROM data_admin WHERE email = '$email'");
        if(mysqli_num_rows($query_fetch_name)){
            return false;
            exit;
        }elseif(mysqli_num_rows($query_fetch_mail)){
            return false;
            exit;
        }

        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $set_query  = "INSERT INTO data_admin VALUE
        (NULL, '$nama', '$email', '$pass_hash', '$img', '$role')";
        mysqli_query($this->db, $set_query);
        return mysqli_affected_rows($this->db);
    }
    public function addAuthor($post){
        global $db;
        $nama = htmlspecialchars($post["nama"]);
        $email = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);
        $img = "default.png";
        $role = "Author";
        $query_fetch_name = mysqli_query($this->db, "SELECT * FROM data_author WHERE nama = '$nama'");
        $query_fetch_mail = mysqli_query($this->db, "SELECT * FROM data_author WHERE email = '$email'");
        if(mysqli_num_rows($query_fetch_name)){
            return false;
            exit;
        }elseif(mysqli_num_rows($query_fetch_mail)){
            return false;
            exit;
        }

        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $set_query  = "INSERT INTO data_author VALUE
        (NULL, '$nama', '$email', '$pass_hash', '$img', '$role')";
        mysqli_query($this->db, $set_query);
        return mysqli_affected_rows($this->db);
    }
    public function addStudent($post){
        global $db;
        $nama = htmlspecialchars($post["nama"]);
        $email = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);
        $img = "default.png";
        $role = "Student";
        $query_fetch_name = mysqli_query($this->db, "SELECT * FROM data_student WHERE nama = '$nama'");
        $query_fetch_mail = mysqli_query($this->db, "SELECT * FROM data_student WHERE email = '$email'");
        if(mysqli_num_rows($query_fetch_name)){
            return false;
            exit;
        }elseif(mysqli_num_rows($query_fetch_mail)){
            return false;
            exit;
        }

        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $set_query  = "INSERT INTO data_student VALUE
        (NULL, '$nama', '$email', '$pass_hash', '$img', '$role')";
        mysqli_query($this->db, $set_query);
        return mysqli_affected_rows($this->db);
    }
    public function ChangePassword($data_post){
        global $db;
    
        // Ambil ID dari sesi
        $id = $_SESSION["4dM!n_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdszxw2t_"];
        $pass_old = htmlspecialchars($data_post["pass_old"]);
        $pass_new = htmlspecialchars($data_post["pass_new"]);
        $confirm_pass = htmlspecialchars($data_post["confirm_pass"]);
        $query = mysqli_prepare($db, "SELECT * FROM data_admin WHERE id = ?");
        mysqli_stmt_bind_param($query, "i", $id);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
    
        if(mysqli_num_rows($result) == 1){
            $fetch_assoc = mysqli_fetch_assoc($result);
            if(!password_verify($pass_old, $fetch_assoc["password"])){
                return false; // Password lama tidak cocok
            }
            if($pass_old == $pass_new){
                return false;
            }
            if($pass_new != $confirm_pass){
                return false; // Password baru dan konfirmasi tidak cocok
            }
            $hash_pass = password_hash($pass_new, PASSWORD_DEFAULT);
            $set_query = mysqli_prepare($db, "UPDATE data_admin SET password = ? WHERE id = ?");
            mysqli_stmt_bind_param($set_query, "si", $hash_pass, $id);
            mysqli_stmt_execute($set_query);
    
            return mysqli_stmt_affected_rows($set_query);
        } else {
            return false;
        }
    }
    public function delete_admin($data_post){
        $id = $data_post["id"];
        $object_query = "DELETE FROM data_admin WHERE id = $id";
        mysqli_query($this->db, $object_query);
        return mysqli_affected_rows($this->db);
    }
    public function delete_guest($data_post){
        $id = $data_post["id"];
        $object_query = "DELETE FROM guest WHERE id = $id";
        mysqli_query($this->db, $object_query);
        return mysqli_affected_rows($this->db);
    }

}
class Delete {
    private $db;
    public function __construct() {
        $this->db = mysqli_connect("localhost", "root", "", "portal_data");
    }

    public function query($query) {
        $result = mysqli_query($this->db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function hapus($data) {
        $id = $data["id"];
        $table = $data["get"];
        $object_sprt = "DELETE FROM $table WHERE id = $id";
        mysqli_query($this->db, $object_sprt);
        return mysqli_affected_rows($this->db);
    }

    public function hapusLaptop($id) {
        $object_laptop = "DELETE FROM laptop WHERE id = $id";
        mysqli_query($this->db, $object_laptop);
        return mysqli_affected_rows($this->db);
    }

    public function closeConnection() {
        mysqli_close($this->db);
    }
}

$db = new Database();

$db->closeConnection();
?>
