<?php
require "core/function.php";
$query = new Database();
// $entered = new entered($query->db);
$delete = new Delete();
session_start();
if(!isset($_SESSION["4dM1n_97bhsalyg7GGVzxdkj_12ndq"]) && !isset($_SESSION["4uth00rr9jb;iad_97bhsalyg7GGVhg dkj_12bdq"]) && !isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])){
    header("location: ../index.php");
    exit;
}
$db = mysqli_connect("localhost","root","","learning");
if(isset($_POST["query"])){
    $tanggal_mulai = $_POST["tanggal_mulai"];
    $tanggal_selesai = $_POST["tanggal_selesai"];
    // Ubah format tanggal dari d-m-Y ke Y-m-d untuk perbandingan
    $tanggal_valid_mulai = date("Y-m-d", strtotime(str_replace('-', '/', $tanggal_mulai)));
    $tanggal_valid_selesai = date("Y-m-d", strtotime(str_replace('-', '/', $tanggal_selesai)));
    $dmy_mulai = date("d-m-Y", strtotime(str_replace('-', '/', $tanggal_mulai)));
    $dmy_selesai = date("d-m-Y", strtotime(str_replace('-', '/', $tanggal_selesai)));
    $fetch= $query->query("SELECT * FROM article WHERE STR_TO_DATE(tgl, '%d-%m-%Y') BETWEEN '$tanggal_valid_mulai' AND '$tanggal_valid_selesai'");
}else{
    $fetch= $query->query("SELECT * FROM article");
}
$fetch1 = $query->query("SELECT * FROM article");
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
// Add data section
if(isset($_POST["addData"])){
    if($entered->addData_in($_POST) > 0){
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
                window.location.replace('entered.php');
            }, 2000);   
        });
      </script>";
}else{
echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function () { 
                swal({
                    title: 'Gagal!!',
                    text: 'Hi, Sorry, Gagal menambah data baru !',
                    icon: 'error',
                    button: {
                        className: 'btn btn-danger'
                    }
                });    
            }, 10);  
            window.setTimeout(function() { 
                window.location.replace('entered.php');
            }, 2000);   
        });
      </script>";
}
}

// Edit data section
if(isset($_POST["editData"])){
    if($entered->editData_in($_POST) > 0){
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
                window.location.replace('entered.php');
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
                window.location.replace('entered.php');
            }, 2000);   
        });
      </script>";
}
}

// Delete data section
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
                        window.location.replace('entered.php');
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
                        window.location.replace('entered.php');
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
    <title>Materi</title>
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
                    <h1 class="h3 mb-2 text-gray-800 mb-5">Content you can watch</h1>
                    <!-- DataTales Example -->
                    <?php if(!isset($_SESSION["5ttuD3n008yjzzzxM_97bhsalyg7GGVzxdkj_12ndq"])) :?>
                            <button class="btn btn-success btn-sm">Add Video</button>
                            <button class="btn btn-warning btn-sm">Manage Video</button>
                            <?php endif ;?>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Sejarah Komputer</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/gfBOWn_oHBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Konfigurasi mikrotik</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/3jsI6h2EwGA?si=GSQONeL9K7cEiv7q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Sejarah Komputer</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/gfBOWn_oHBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Sejarah Komputer</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/gfBOWn_oHBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Sejarah Komputer</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/gfBOWn_oHBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-1 mt-1">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="work__container">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                            <h5>Sejarah Komputer</h5>
                                            <iframe class="p-3" width="360" height="215" src="https://www.youtube.com/embed/gfBOWn_oHBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <b>Silakan simak materi ini</b>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                            <!-- Tambahkan lebih banyak card jika diperlukan -->
                        </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->            
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