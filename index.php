<?php
session_start();
if(isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"])){
    header("location: page/dashboard.php");
    exit;
}
if(isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"])){
    header("location: page/dashboard.php");
    exit;
}
if(isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])){
    header("location: page/dashboard.php");
    exit;
}
require "page/core/function.php";
$db = mysqli_connect("localhost","root","","learning");
function loginAdmin($email, $password) {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM data_admin WHERE email = '$email'");
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $nama = $row["nama"];
        if (password_verify($password, $row["password"])) {
            $_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"] = true;
            $_SESSION["4dM!n_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdszihiuiu2t009"] = $id; // Simpan ID admin dalam sesi
            $_SESSION["4dM1n_N4am3_bHGO5fcszwqQkljbc9_1nZmqsx"] = $nama; // Simpan nama admin dalam sesi (opsional)
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Sukses!',
                            text: 'Hi, $nama, Anda berhasil login.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('page/dashboard.php');
                    }, 3000);   
                });
              </script>";
        } else {
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'PASSWORD SALAH !!!',
                            text: 'Hi, $nama, Sorry, Password yang dimasukan salah !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'EMAIL TIDAK TERDAFTAR!',
                            text: '$email, Email ini tidak terdaftar!',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
    }
}
function loginAuthor($email, $password) {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM data_author WHERE email = '$email'");
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $nama = $row["nama"];
        if (password_verify($password, $row["password"])) {
            $_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"] = true;
            $_SESSION["4uth00rr9jb;iad09uh_!d_S0vgiiQDC4ygv8uYGhmma129aAA_Id_Succ33ss_wdsz09hhx2t99ty"] = $id; // Simpan ID admin dalam sesi
            $_SESSION["4uth00rr9jb;iad987fu_bHGO5fcszwqQkmibc9_1nZmqsx"] = $nama; // Simpan nama admin dalam sesi (opsional)
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Sukses!',
                            text: 'Hi, $nama, Anda berhasil login sebagai Author.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('page/dashboard.php');
                    }, 3000);   
                });
              </script>";
        } else {
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'PASSWORD SALAH !!!',
                            text: 'Hi, $nama, Sorry, Password yang dimasukan salah !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'EMAIL TIDAK TERDAFTAR!',
                            text: '$email, Email ini tidak terdaftar!',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
    }
}
function loginStudent($email, $password) {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM data_student WHERE email = '$email'");
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $nama = $row["nama"];
        if (password_verify($password, $row["password"])) {
            $_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"] = true;
            $_SESSION["5ttuD3n008yjzzzxM_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdshjb6r76iyc"] = $id; // Simpan ID admin dalam sesi
            $_SESSION["5ttuD3n008yjzzzxM_N4am3_bHGO5fcszwwe08zz9_1nZewewfsx"] = $nama; // Simpan nama admin dalam sesi (opsional)
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Sukses!',
                            text: 'Hi, $nama, Anda berhasil login sebagai Student.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('page/dashboard.php');
                    }, 3000);   
                });
              </script>";
        } else {
            echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'PASSWORD SALAH !!!',
                            text: 'Hi, $nama, Sorry, Password yang dimasukan salah !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'EMAIL TIDAK TERDAFTAR!',
                            text: '$email, Email ini tidak terdaftar!',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('index.php');
                    }, 8000);   
                });
              </script>";
    }
}
if(isset($_POST["Login_user"])){
    $email = $_POST["email"]; // Ambil email dari input
    $query = $db->query("SELECT * FROM data_admin WHERE email = '$email'"); // Ganti $query dengan $db
    $query_aut = $db->query("SELECT * FROM data_author WHERE email = '$email'"); // Ganti $query dengan $db
    $query_stu = $db->query("SELECT * FROM data_student WHERE email = '$email'"); // Ganti $query dengan $db
    $role = $query->fetch_assoc(); $role_aut = $query_aut->fetch_assoc(); $role_stu = $query_stu->fetch_assoc();
    if($role["role"] == "Admin"){
        loginAdmin($email, $_POST["password"]);
    } elseif($role_aut["role"] == "Author"){
        loginAuthor($email, $_POST["password"]);
    } elseif($role_stu["role"] == "Student"){
        loginStudent($email, $_POST["password"]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="css/styles.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Login - Digital Learning</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                   <header><h3>DIGITAL<sup><b>Learning</b></sup></h3></header>
                   <form action="" method="post">
                   <div class="input-field">
                        <input type="email" name="email" class="input" id="email" required="" autocomplete="off">
                        <label for="email">Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" name="password" class="input" id="pass" required="">
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        <input type="submit" name="Login_user" class="btn btn-outline-info" value="Login">
                   </div>
                   </form>
                   <div class="signin">
                    <!-- <span>Login student,  <a href="#" data-toggle="modal" data-target="#loginGuest">Log in</a></span> -->
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!--ModalLogin-->
<div class="modal fade" id="loginStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login sebagai student</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
                        <div class="container mt-3">
                        <form class="user" action="" method="post">
                        <div class="form-group">
                            <h6 class="mb-3"><b>Email :</b></h6>
                            <input type="email" name="emailStudent" autofocus="" required="" class="form-control form-control-user mb-4" id="exampleInputEmail" aria-describedby="emailHelp"placeholder="Masukan alamat email...">
                            <h6 class="mb-3"><b>Password :</b></h6>
                            <input type="email" name="passStudent" autofocus="" required="" class="form-control form-control-user mb-4" id="exampleInputEmail" aria-describedby="password"placeholder="Masukan password...">
                        </div>
                        </div>
                <hr>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="guest" href="#">Log in</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/js.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/sweetalert.min.js" ></script>
</body>
</html>