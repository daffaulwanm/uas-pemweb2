<?php
require "core/function.php";
$query = new Database();
$article = new Article($query->db);
// $sparepart = new Sparepart($query->db);
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
$query = mysqli_query($db, "SELECT * FROM $table WHERE id = $id");
while($fetch_query = mysqli_fetch_assoc($query)){
    $fetch_data = $fetch_query;
}
// $article_fetch = mysqli_query($db, "SELECT * FROM article WHERE status = 'Approved'");
$article_fetch = mysqli_query($db, "SELECT * FROM article WHERE status = 'Approved'");
$fetch_article = mysqli_fetch_all($article_fetch, MYSQLI_ASSOC); 
$manage_fetch = mysqli_query($db, "SELECT * FROM article");
$fetch_manage = mysqli_fetch_all($manage_fetch, MYSQLI_ASSOC);
$manage_komen = mysqli_query($db, "SELECT * FROM komentar");
$fetch_komen = mysqli_fetch_all($manage_komen, MYSQLI_ASSOC);
// $fetch= $query->query("SELECT * FROM article");
if (isset($_POST["addData"])){
    if($sparepart->addData($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambah data baru.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal menambah data !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('laptop.php');
                    }, 2000);   
                });
              </script>";
    }
}
if(isset($_POST["editData"])){
    if($sparepart->editData($_POST) > 0 ){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil mengubah data.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal mengubah data !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('laptop.php');
                    }, 2000);   
                });
              </script>";
    }
}
if(isset($_POST["hapus"])){
    if($delete->hapus($_POST) > 0 ){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menghapus data.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal menghapus data !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }
}

if(isset($_POST["add_article"])){
    if($article->addArticle($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambah artikel baru, namun harus menunggu approvel admin.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal menambah artikel !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }
}
if(isset($_POST["comment"])){
    if($article->addComment($_POST) > 0){
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Berhasil!',
                            text: 'Hi, Anda berhasil menambahkan komentar.',
                            icon: 'success',
                            button: {
                                className: 'btn btn-success'
                            }
                        }); 
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
                });
              </script>";
    }else{
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function () { 
                        swal({
                            title: 'Gagal!!',
                            text: 'Hi, Sorry, Gagal menambahkan komentar !',
                            icon: 'error',
                            button: {
                                className: 'btn btn-danger'
                            }
                        });    
                    }, 10);  
                    window.setTimeout(function() { 
                        window.location.replace('dashboard.php');
                    }, 2000);   
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
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="../css/styles.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #F5F6FA;" >
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
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
                <a class="nav-link text-dark" href="dashboard.php">
                    <i class="icon_nav1 fas fa-fw fa-server" style="color:#36B9CC"></i>
                    <span>Let's read</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="learn.php">
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
                    <?php if(!isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"]) && !isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"]) && !isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])) :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Guest</h4></b></div>
                    <?php elseif(isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"])) :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Admin</h4></b></div>
                    <?php elseif(isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"])) :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Author</h4></b></div>
                    <?php elseif(isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])) :?>
                        <div class="navbar-brand-text mt-3 p-1"><b><h4 class="text-white">Student</h4></b></div>
                    <?php endif ;?>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white">
                                    <?php ?>
                                    <?=$fetch_data["nama"]?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile_2.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile/profile.php">
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
                    <h1 class="h3 mb-2 text-gray-800 mb-5">Article</h1>
                    <!-- DataTales Example -->
                        <?php if(!isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])) :?>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Add_Article-1">Add new article</button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal_List_user-1"><b>Manage Article</b></button>
                        <?php endif ;?>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            
                            <?php foreach($fetch_article as $article) :?>
                            <div class="col mb-1 mt-1">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$article["judul"];?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a class="btn btn-primary float-lg-right" data-toggle="modal" data-target="#Read_Article-1">Baca</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ;?>
                        </div>


                </div>
                <!-- /.container-fluid -->
                 <hr class="mb-4 mt-4">
                 <div class="container-fluid mb-3">
                    <div class="row">
                        <div class="col">
                            <h3>Comment</h3>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Your comment</label>
                            <form action="" method="post">
                            <input type="text" name="nama" value="<?=$fetch_data["nama"]?>" hidden>
                            <textarea type="text" class="form-control" name="isi_comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" name="comment" class="btn btn-dark btn-sm">Send comment</button>
                            </form>
                        </div>
                    </div>
                    <hr class="mb-2 mt-4">
                    <?php foreach($manage_komen as $komentar) :?>
                    <section>
                    <i class="fas fa fa-user"><span class="small"><?=$komentar["nama"]?></span></i>
                    <p><?=$komentar["komentar"]?></p>
                    </section>
                    <?php endforeach ;?>
                 </div>
            </div>
            <!-- End of Main Content -->
             <!-- Modal add article-->
            <div class="modal fade" id="Add_Article-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Add new article</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <label for="pass_old">Judul Article :</label>
                                                                                        <input class="form-control" required="" type="test" name="judul">
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="pass_new">Penulis :</label>
                                                                                        <input class="form-control" required="" type="text" name="penulis">
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Kalimat Pembuka :</label>
                                                                                        <textarea class="form-control" required="" name="pembuka" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Paragraf 1) :</label>
                                                                                        <textarea class="form-control" required="" name="p1" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Paragraf 2) :</label>
                                                                                        <textarea class="form-control" required="" name="p2" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Paragraf 3) :</label>
                                                                                        <textarea class="form-control" name="p3" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Kesimpulan) :</label>
                                                                                        <textarea class="form-control" required="" name="kesimpulan" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Sumber dan Referensi) :</label>
                                                                                        <textarea class="form-control" required="" name="sumber" rows="3"></textarea>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="confirm_pass">Isi Article (Penutup) :</label>
                                                                                        <textarea class="form-control" required="" name="penutup" rows="3"></textarea>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="add_article">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal Add article-->
                                                                 <!---- Modal add article-->
                                                                    <div class="modal fade" id="Approvel-1" tabindex="-0" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Approvel Article</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="" method="post">
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <label for="pass_old">Judul Article :</label>
                                                                                        <input class="form-control" required="" type="test" name="judul">
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <label for="pass_new">Penulis :</label>
                                                                                        <input class="form-control" required="" type="text" name="penulis">
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="add_article">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal Add approvel->
                                                                 <!- modal manage article-->
                    <div class="modal fade" id="Modal_List_user-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Manage Article</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Article title</th>
                                                                    <th scope="col">Author</th>
                                                                    <th scope="col">Condition</th>
                                                                    <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $nomor = 1; ?>
                                                                <?php foreach($manage_fetch as $artikel_manage) :?>
                                                                <tbody>
                                                                    <tr class="text-center">
                                                                    <th scope="row"><?=$nomor++?></th>
                                                                    <td><?=$artikel_manage["judul"]?></td>
                                                                    <td><?=$artikel_manage["author"]?></td>
                                                                    <td><?=$artikel_manage["status"]?></td>
                                                                    <td>
                                                                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle mb-2" data-toggle="dropdown" aria-expanded="false">
                                                                            Options
                                                                        </button>
                                                                        <ul class="dropdown-menu" style="background-color: whitesmoke;">
                                                                        <li><a class="dropdown-item text-center" href="">View</b></a></li>
                                                                        <?php if(!isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"])) :?>
                                                                        <li><a class="dropdown-item text-center" href="#"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Approvel-1">Approved</button></a></li>
                                                                        <li><a class="dropdown-item text-center" href="#"><b>Reject</b></a></li>
                                                                        <?php endif;?>
                                                                        <li><a class="dropdown-item text-center" href="#"><b>Edit</b></a></li>
                                                                        <li><a class="dropdown-item text-center" href="#"><b>Delete</b></a></li>
                                                                        </ul>
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
                                                                <?php endforeach;?>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer"> 
                                                            <!-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_Admin-1">Add new article</button> -->
                                                            <!-- <button class="btn btn-danger"  type="submit" name="hapus">Hapus</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal manage article-->
                                             <!-- Modal read article-->
            <div class="modal fade" id="Read_Article-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Judul Article</b></h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <ul>
                                                                                    <li class="list-group-item">Penulis : Fajar eka pratama</li>
                                                                                    <li class="list-group-item">Tanggal : 02-08-2024</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"  type="submit" name="change_pass">Save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end modal read article-->
            
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout??</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih "Logout" untuk Keluar.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="core/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-info">
                <div class="container my-auto">
                    <div class="copyright text-center text-white my-auto">
                        <span><b>Copyright &copy; Internal Technical Support, NashTaGroup 2024</b></span>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/js.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/sweetalert.min.js"></script>
</html>