<!--Counter Inbox-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD E-VOTING RW 02 | Laporan Hasil Pemilihan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/voting.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Menu Utama</li>
          <li>
            <a href="<?php echo base_url() . 'dashboard' ?>">
              <i class="fa fa-bar-chart"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url() . 'pemilih' ?>">
              <i class="fa fa-users"></i> <span>Data Pemilih</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url() . 'calon' ?>">
              <i class="fa fa-user"></i> <span>Data Calon Ketua RT</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url() . 'jadwal' ?>">
              <i class="fa fa-clock-o"></i> <span>Jadwal Pemilihan</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i>
              <span>Kelola Pengumuman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url() . 'pengumuman/add_pengumuman' ?>"><i class="fa fa-thumb-tack"></i> Tambah Pengumuman Baru</a></li>
              <li><a href="<?php echo base_url() . 'pengumuman' ?>"><i class="fa fa-list"></i> Daftar Pengumuman</a></li>
            </ul>
          </li>

          <li class="active">
            <a href="<?php echo base_url() . 'hasil_pemilihan' ?>">
              <i class="fa fa-archive"></i> <span>Laporan Hasil Pemilihan</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

          <li>
            <a data-toggle="modal" data-target="#ModalLogout">
              <i class="fa fa-sign-out"></i> <span>Keluar</span>
              <span class="pull-right-container">
                <small class="label pull-right"></small>
              </span>
            </a>
          </li>

        </ul>
      </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Hasil Pemilihan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bar-chart"></i> Dashboard</a></li>
        <li class="active">Laporan Hasil Pemilihan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#ModalCetak"><span class="fa fa-print"></span> Cetak Laporan PDF</a>
            <a class="btn btn-danger btn-flat" data-toggle="modal" data-target="#ModalHapusSemua"><span class="fa fa-trash"></span> Hapus Semua Data</a> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
					<th style="width:100px;">RT</th>
                    <th>Calon No Urut</th>
                    <th>Nama Calon</th> 
                    <th>Suara Terkumpul</th> 
                    <th>Warga Belum Memilih</th>  
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
					foreach ($data->result_array() as $i) :
					   $no++;
                       $id=$i['hasil_pemilihan_id'];
                       $rt=$i['hasil_pemilihan_rt'];
                       $calon_urut=$i['calon_noUrut'];
                       $nama=$i['hasil_pemilihan_calon'];
                       $suara=$i['hasil_pemilihan_suara'];
                       $golput=$i['hasil_pemilihan_golput'];
                    ?>
                <tr>
                  <td><?php echo $rt;?></td>
                  <td><?php echo $calon_urut;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $suara;?></td>
                  <td><?php echo $golput;?></td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="">DEVELOPER</a>.</strong> All rights reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
	
  <div class="modal fade" id="ModalHapusSemua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Semua Data Hasil Pemilihan Ketua RT</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'hasil_pemilihan/hapus_semua_hasil_pemilihan' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus semua data hasil pemilihan ketua RT ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Cetak Laporan PDF</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'cetak_laporan' ?>" method="post" enctype="multipart/form-data" target="_blank">
            <div class="modal-body">
              <p>Apakah Anda yakin ingin mencetak laporan ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Cetak</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--Modal Logout-->
  <div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Keluar</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'administrator/logout' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <p>Apakah anda yakin ingin keluar ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Keluar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Komentar telah dibalas.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Komentar berhasil di publikasi.",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Laporan Hasil Pemilihan Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
