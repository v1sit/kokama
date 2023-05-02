<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon"> </div>
                <div class="sidebar-brand-text mx-2">KOKAMA RSPR </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>
            <div class="sidebar-heading"> Home </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('user'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('toko'); ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Toko</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div> 
                        <br>
                        <h1 class="h3 mb-4 text-gray-800">Detail Keranjang</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- cart -->
                        <div class="navbar">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span class="ml-2"></span> 
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <?php $keranjang ='Keranjang: '.$this->cart->total_items().' ' ?>
                                    <?php echo anchor ('toko/detil_cart', $keranjang) ?>
                                </li>
                            </ul>
                        </div>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">  Selamat datang, <?= $user['name']; ?> </span>
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <!-- <img class="img-profile rounded-circle"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>


                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
              
                    <div class="container-fluid">
                        <h4> Keranjang Belanja</h4>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th> No</th>
                                <th> Nama Barang</th>
                                <th> Jumlah</th>
                                <th> Harga</th>
                                <th> Action</th>
                               
                            </tr> 

                            <?php $no=1;
                            foreach($this->cart->contents()as $items): ?>
                            <tr>
                                <td> <?php echo $no++?> </td>
                                <td> <?php echo $items['name']?> </td> 
                                <td> <?php echo $items['qty']?> </td>
                                <td> <?php echo $items['price']?> </td>
                                <td width="5%"> <div align> <?php echo anchor('toko/hapus_cart/'. $items['rowid'],'<div class = "btn btn-sm btn-danger"> hapus </div>')?> </div> </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>   
                    </div>

        </div>
        
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Kokama Trial 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            
            <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">yakin ingin keluar? tekan tombol logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>

