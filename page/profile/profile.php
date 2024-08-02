<?php
require "../core/function.php";
$query = new Database();
$profile = new Profile($query->db);
$delete = new Delete();
session_start();
if(!isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"]) && !isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"]) && !isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])){
    header("location: ../index.php");
    exit;
}
$db = mysqli_connect("localhost","root","","learning");

if (isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"])) {
    $table = "data_admin";
    $id = $_SESSION["4dM!n_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdszihiuiu2t009"];
} elseif(isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"])) {
    $table = "data_author";
    $id = $_SESSION["4uth00rr9jb;iad09uh_!d_S0vgiiQDC4ygv8uYGhmma129aAA_Id_Succ33ss_wdsz09hhx2t99ty"];
} elseif(isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])) {
    $table = "data_student";
    $id = $_SESSION["5ttuD3n008yjzzzxM_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdshjb6r76iyc"];
} else {
    // Tambahkan kondisi default jika tidak ada sesi yang cocok
    die('Tidak ada sesi yang cocok.'); // Menghentikan eksekusi jika tidak ada sesi
}
$id = mysqli_real_escape_string($db, $id);
$stmt = mysqli_prepare($db, "SELECT * FROM $table WHERE id = ?");
if ($stmt === false) {
    die('Failed to prepare statement');
}
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    $fetch_admin = $row;
}
mysqli_stmt_close($stmt);


$fetch = $query->query("SELECT * FROM data_admin");
$fetch_author = $query->query("SELECT * FROM data_author");
$fetch_student = $query->query("SELECT * FROM data_student");
if(isset($_POST["hapus_Admin-1"])){
    $id_log = $_SESSION["4dM!n_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdszxw2t_"];
    $id_post = $_POST["id"];
    if($id_log != $id_post){
        if($profile->delete_admin($_POST) > 0 ){
            echo "<script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function () { 
                            swal({
                                title: 'Berhasil!',
                                text: 'Hi, Anda berhasil menghapus data admin.',
                                icon: 'success',
                                button: {
                                    className: 'btn btn-success'
                                }
                            }); 
                        }, 10);  
                        window.setTimeout(function() { 
                            window.location.replace('profile.php');
                        }, 2000);   
                    });
                  </script>";
        }else{
            echo "<script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function () { 
                            swal({
                                title: 'Gagal!!',
                                text: 'Hi, Sorry, Gagal menghapus data admin!',
                                icon: 'error',
                                button: {
                                    className: 'btn btn-danger'
                                }
                            });    
                        }, 10);  
                        window.setTimeout(function() { 
                            window.location.replace('profile.php');
                        }, 2000);   
                    });
                  </script>";
        } 
    }else{
        $id_log = $_SESSION["4dM!n_!d_S0vgiiQDC128uYGhmma129aAA_Id_Succ33ss_wdszxw2t_"];
        $fetch = $query->query("SELECT * FROM data_admin WHERE id = $id_log");
        $nama = $fetch[0]["nama"];
        echo "<script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function () { 
                            swal({
                                title: '$nama, Tidak bisa dihapus!!',
                                text: 'Hi Sorry, Anda tidak dapat menghapus akun yang sedang login ..',
                                icon: 'error',
                                button: {
                                    className: 'btn btn-danger'
                                }
                            });    
                        }, 10);  
                        window.setTimeout(function() { 
                            window.location.replace('profile.php');
                        }, 7000);   
                    });
                  </script>";
    }
}
if(isset($_POST["hapus_Guest-2"])){
    if($profile->delete_guest($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menghapus data guest.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal menghapus data guest!',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }
}
if(isset($_POST["change_pass"])){
    if($profile->ChangePassword($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil mengganti password.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry pastikan tidak sama dengan password lama dan pastikan konfirmasi pasword sesuai !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 5000);   
                });
              </script>";
    }
}
if(isset($_POST["add_Admin"])){
    if($profile->addAdmin($_POST) > 0 ){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambah admin baru',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function () { 
                swal({
                    title: 'Gagal!!',
                    text: 'Hi, Sorry Nama / Email anda sudah terdaftar, gunakan nama dan email lain !!',
                    icon: 'error',
                    button: {
                        className: 'btn btn-danger'
                    }
                });    
            }, 10);  
            window.setTimeout(function() { 
                window.location.replace('profile.php');
            }, 6000);   
        });
      </script>";
    }
}
if(isset($_POST["add_Author"])){
    if($profile->addAuthor($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambah author baru',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function () { 
                swal({
                    title: 'Gagal!!',
                    text: 'Hi, Sorry Nama/Email anda sudah terdaftar, gunakan Nama/email lain !!',
                    icon: 'error',
                    button: {
                        className: 'btn btn-danger'
                    }
                });    
            }, 10);  
            window.setTimeout(function() { 
                window.location.replace('profile.php');
            }, 6000);   
        });
      </script>";
    }
}
if(isset($_POST["add_Student"])){
    if($profile->addStudent($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambah student baru',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('profile.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function () { 
                swal({
                    title: 'Gagal!!',
                    text: 'Hi, Sorry Nama/Email anda sudah terdaftar, gunakan Nama/email lain !!',
                    icon: 'error',
                    button: {
                        className: 'btn btn-danger'
                    }
                });    
            }, 10);  
            window.setTimeout(function() { 
                window.location.replace('profile.php');
            }, 6000);   
        });
      </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="../../css/styles.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/profile.css">
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Profile Akun</title>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #F5F6FA;" >
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard.php">
                <div class="sidebar-brand-text mx-3 mt-3 p-2"><h3 class="text-dark"><b>Digital <sup>Learning</sup> </b></h3></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0" style="background-color: #36B9CC;">
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                <!-- Interface -->
            </div>
            <!-- Heading -->
            <div class="sidebar-heading">
                <!-- Addons -->
            </div>
            <li class="nav-item active mt-5">
                <a class="nav-link text-dark" href="../dashboard.php">
                    <i class="icon_nav1 fas fa-fw fa-server" style="color:#36B9CC"></i>
                    <span>Let's read</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="../learn.php">
                    <i class="icon_nav1 fas fa-fw fa-server" style="color:#36B9CC"></i>
                    <span>Watch the content</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" style="background-color: #36B9CC;">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 text-white" id="sidebarToggle" style="background-color: #36B9CC;"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow">
                <!-- <div class="navbar-brand-text mx-3"><b><h4 class="text-white">Portal Data</h4></b></div> -->
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="text-white fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <?php if(!isset($_SESSION["guest"])) :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Admin</h4></b></div>
                    <?php else :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Student</h4></b></div>
                    <?php endif ;?>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white">
                                    <?php ?>
                                    <?=$fetch_admin["nama"]?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile_2.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow-lg">
                    <h1 class="h3 text-dark mb-2 mt-2 px-3"><b>Profile</b></h1>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-4 d-flex justify-content-center">
                            <img src="../../img/undraw_profile_2.svg" width="45%" alt="">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <h5>Nama  : <li type="text" name="nama" value="" class="form-control list-group-item"><?=$fetch_admin['nama']?></li></h5>
                                <h5>Email  : <li type="text" name="nama" value="" class="form-control list-group-item"><?=$fetch_admin['email']?></li></h5>
                                <h5>Role Account  : <li type="text" name="nama" value="" class="form-control list-group-item"><?=$fetch_admin['role']?></li></h5>
                                <?php if(!isset($_SESSION["1D_6u3ssTqljsvhc62ev_!DBKzzxasx"])):?>
                                <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Change_Pass-1<?=$fetch_admin["id"]?>">Change Password</button>
                                <?php endif ;?>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <?php if(!isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"]) && !isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"])) :?>
                    <a class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#Modal_List_user-1"><b>Admin</b></a>
                    <a class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#Modal_List_user-3"><b>Author</b></a>
                    <a class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#Modal_List_user-2"><b>Student</b></a>
                    <?php endif ;?>
                    <!-- modal table admin-->
                    <div class="modal fade" id="Modal_List_user-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">List Admin</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Role Account </th>
                                                                    <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $nomor = 1; ?>
                                                                <?php foreach($fetch as $data) :?>
                                                                <tbody>
                                                                    <tr class="text-center">
                                                                    <th scope="row"><?=$nomor++?></th>
                                                                    <td><?=$data["nama"]?></td>
                                                                    <td><?=$data["email"]?></td>
                                                                    <td><?=$data["role"]?></td>
                                                                    <td>
                                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_data_admin-1<?=$data["id"]?>"><b>Delete</b></a>
                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!-- Modal hapus admin-->
                                                                <div class="modal fade" id="hapus_data_admin-1<?=$data["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this account? <br><b>Nama : <?=$data["nama"]?><br>Email : <?=$data["email"]?></b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">If you press the "Delete" button, the data will be deleted permanently.</div>
                                                                            <form action="" method="post">
                                                                            <input type="hidden" value="<?=$data["id"]?>" name="id">
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                                                                                <button class="btn btn-danger"  type="submit" name="hapus_Admin-1">Delete Admin</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal hapus admin-->
                                                                <?php endforeach ;?>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer"> 
                                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_Admin-1">Add new admin</button>
                                                            <!-- <button class="btn btn-danger"  type="submit" name="hapus">Hapus</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal table admin-->
                                            <!-- modal table student-->
                    <div class="modal fade" id="Modal_List_user-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">List Student</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Role Account</th>
                                                                    <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $nomor = 1; ?>
                                                                <?php foreach($fetch_student as $data_student) :?>
                                                                <tbody>
                                                                    <tr class="text-center">
                                                                    <th scope="row"><?=$nomor++?></th>
                                                                    <td><?=$data_student["nama"]?></td>
                                                                    <td><?=$data_student["email"]?></td>
                                                                    <td><?=$data_student["role"]?></td>
                                                                    <td>
                                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_data-2<?=$data_student["id"]?>"><b>Delete</b></a>
                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!-- modal hapus student-->
                                                                <div class="modal fade" id="hapus_data-2<?=$data_student["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this account? <br><b>Nama : <?=$data_student["nama"]?><br>Email : <?=$data_student["email"]?></b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">If you press the "Delete" button, the data will be deleted permanently.</div>
                                                                            <div class="modal-footer">
                                                                                <form action="" method="post">
                                                                                    <input value="<?=$data_student["id"]?>" type="hidden" name="id" class="form-control">
                                                                                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                                                                                    <button class="btn btn-danger"  type="submit" name="hapus_Guest-2" >Delete Student</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal hapus student-->
                                                                <?php endforeach ;?>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer"> 
                                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_Student-1">Add Student</button>
                                                            <!-- <button class="btn btn-danger"  type="submit" name="hapus">Hapus</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal table student-->
                                             <!-- modal table author-->
                    <div class="modal fade" id="Modal_List_user-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">List Author</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Role Account</th>
                                                                    <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $nomor = 1; ?>
                                                                <?php foreach($fetch_author as $data_author) :?>
                                                                <tbody>
                                                                    <tr class="text-center">
                                                                    <th scope="row"><?=$nomor++?></th>
                                                                    <td><?=$data_author["nama"]?></td>
                                                                    <td><?=$data_author["email"]?></td>
                                                                    <td><?=$data_author["role"]?></td>
                                                                    <td>
                                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_data-2<?=$data_author["id"]?>"><b>Delete</b></a>
                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!-- modal hapus author-->
                                                                <div class="modal fade" id="hapus_data-2<?=$data_author["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this account? <br><b>Nama : <?=$data_author["nama"]?><br>Email : <?=$data_author["email"]?></b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">If you press the "Delete" button, the data will be deleted permanently.</div>
                                                                            <div class="modal-footer">
                                                                                <form action="" method="post">
                                                                                    <input value="<?=$data_author["id"]?>" type="hidden" name="id" class="form-control">
                                                                                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                                                                                    <button class="btn btn-danger"  type="submit" name="hapus_Guest-2" >Delete Author</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal hapus author-->
                                                                <?php endforeach ;?>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer"> 
                                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_Author-1">Add Author</button>
                                                            <!-- <button class="btn btn-danger"  type="submit" name="hapus">Hapus</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal table author-->
                   
            </div>
            <!-- End of Main Content -->
           
            
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to logout??</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" to exit.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="../core/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal ganti password-->
            <div class="modal fade" id="Change_Pass-1<?=$fetch_admin["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Change Password</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <label for="pass_old">Old password</label>
                                                                                        <input class="form-control" type="password" id="pass_old" name="pass_old">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="pass_new">New password</label>
                                                                                        <input class="form-control" type="password" id="pass_new" name="pass_new">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="confirm_pass">Confirm New password</label>
                                                                                        <input class="form-control" type="password" id="confirm_pass" name="confirm_pass">
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="change_pass">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal ganti password-->
                                                                <!-- Modal addAdmin -->
            <div class="modal fade" id="add_Admin-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Add admin</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <label for="pass_old">Name</label>
                                                                                        <input class="form-control" type="nama" required=""  name="nama">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="pass_new">Email</label>
                                                                                        <input class="form-control" type="email" required=""  name="email">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="confirm_pass">Password</label>
                                                                                        <input class="form-control" type="password" required="" name="password">
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="add_Admin">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal addAdmin--->
                                                                 <!-- Modal addAuthor -->
            <div class="modal fade" id="add_Author-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Add Author</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <label for="pass_old">Name</label>
                                                                                        <input class="form-control" type="nama" required=""  name="nama">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="pass_new">Email</label>
                                                                                        <input class="form-control" type="email" required=""  name="email">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="confirm_pass">Password</label>
                                                                                        <input class="form-control" type="password" required="" name="password">
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="add_Author">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal addAuthor-->
                                                                 <!-- Modal addStudent -->
            <div class="modal fade" id="add_Student-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Add Student</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <label for="pass_old">Name</label>
                                                                                        <input class="form-control" type="nama" required=""  name="nama">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="pass_new">Email</label>
                                                                                        <input class="form-control" type="email" required=""  name="email">
                                                                                    </li>
                                                                                    <li>
                                                                                        <label for="confirm_pass">Password</label>
                                                                                        <input class="form-control" type="password" required="" name="password">
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="add_Student">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal addStudent->
                                                                
            <!- Footer -->
            <footer class="sticky-footer mt-5 bg-info" style="position: fixed; bottom: 0; width: 100%;">
                <div class="container my-auto d-flex justify-content-center">
                    <div class="copyright text-center text-white my-auto">
                        <b>Copyright &copy; Internal Technical Support, NashTaGroup 2024</b>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/js.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/sweetalert.min.js"></script>
</html>