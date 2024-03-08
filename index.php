<?php 
    include 'koneksi.php';
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login  Ke Perpustakaan Digital</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Aplikasi Perpustakaan Digital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Navigasi</div>
                            <?php

                             if($_SESSION['user']['level'] !='peminjam'){

                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Buku
                            </a>
                            <?php
                                }else{
                            ?>

                             <a class="nav-link" href="?page=peminjam">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Peminjam
                            </a>
                            <?php
                            }
                            ?>
                             <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>Ulasan
                            </a>
                             <?php

                             if($_SESSION['user']['level'] !='peminjam'){

                            ?>
                                <a class="nav-link" href="?page=laporan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Laporan peminjaman
                                </a>
                            <?php 
                                }
                                ?>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fower-off"></i></div>Logout
                            </a>
                        </div>
                    </div>
                  </nav>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['user']['nama']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        <?php 
                        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                        if(file_exists($page . '.php')){
                            include $page . '.php';
                        }else{
                            include '404.php';
                        }
                         ?>

                        
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
