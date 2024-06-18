<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD E-VOTING RW 02 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url() . 'assets/images/voting.png' ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!--Header-->
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
          <li class="active">
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

          <li>
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
          Dashboard
          <small></small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Hasil Suara Sementara Pemilihan Ketua RT</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChart1" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChart2" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChart3" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>

                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChart4" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChart5" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- ./box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Warga yang belum memilih</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChartgolput1" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChartgolput2" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChartgolput3" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChartgolput4" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <canvas id="myChartgolput5" width="1000" height="280"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- ./box-body -->
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
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url() . 'assets/plugins/sparkline/jquery.sparkline.min.js' ?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="<?php echo base_url() . 'assets/plugins/chartjs/Chart.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/bootstrap/js/Chart.js' ?>"></script>
  <?php
  $koneksi     = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
  $calon1       = mysqli_query($koneksi, "SELECT hasil_pemilihan_calon FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 1");
  $suara1       = mysqli_query($koneksi, "SELECT hasil_pemilihan_suara FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 1");
  $calon2       = mysqli_query($koneksi, "SELECT hasil_pemilihan_calon FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 2");
  $suara2       = mysqli_query($koneksi, "SELECT hasil_pemilihan_suara FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 2");
  $calon3       = mysqli_query($koneksi, "SELECT hasil_pemilihan_calon FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 3");
  $suara3       = mysqli_query($koneksi, "SELECT hasil_pemilihan_suara FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 3");
  $calon4       = mysqli_query($koneksi, "SELECT hasil_pemilihan_calon FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 4");
  $suara4       = mysqli_query($koneksi, "SELECT hasil_pemilihan_suara FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 4");
  $calon5       = mysqli_query($koneksi, "SELECT hasil_pemilihan_calon FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 5");
  $suara5       = mysqli_query($koneksi, "SELECT hasil_pemilihan_suara FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 5");
  $golput1       = mysqli_query($koneksi, "SELECT hasil_pemilihan_golput FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 1");
  $golput2       = mysqli_query($koneksi, "SELECT hasil_pemilihan_golput FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 2");
  $golput3       = mysqli_query($koneksi, "SELECT hasil_pemilihan_golput FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 3");
  $golput4       = mysqli_query($koneksi, "SELECT hasil_pemilihan_golput FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 4");
  $golput5       = mysqli_query($koneksi, "SELECT hasil_pemilihan_golput FROM tbl_hasil_pemilihan where hasil_pemilihan_rt = 5");
  ?>
  <script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: [<?php while ($c1 = mysqli_fetch_array($calon1)) {
                    echo '"' . $c1['hasil_pemilihan_calon'] . '",';
                  } ?>],
        datasets: [{
          label: 'Data Hasil Sementara Suara Terkumpul RT 01',
          backgroundColor: ['rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)'],
          borderColor: ['rgb(0, 0, 102)'],
          data: [<?php while ($s1 = mysqli_fetch_array($suara1)) {
                    echo '"' . $s1['hasil_pemilihan_suara'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: [<?php while ($c2 = mysqli_fetch_array($calon2)) {
                    echo '"' . $c2['hasil_pemilihan_calon'] . '",';
                  } ?>],
        datasets: [{
          label: 'Data Hasil Sementara Suara Terkumpul RT 02',
          backgroundColor: ['rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)'],
          borderColor: ['rgb(255, 0, 0)'],
          data: [<?php while ($s2 = mysqli_fetch_array($suara2)) {
                    echo '"' . $s2['hasil_pemilihan_suara'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById('myChart3').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: [<?php while ($c3 = mysqli_fetch_array($calon3)) {
                    echo '"' . $c3['hasil_pemilihan_calon'] . '",';
                  } ?>],
        datasets: [{
          label: 'Data Hasil Sementara Suara Terkumpul RT 03',
          backgroundColor: ['rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)'],
          borderColor: ['rgb(0, 255, 0)'],
          data: [<?php while ($s3 = mysqli_fetch_array($suara3)) {
                    echo '"' . $s3['hasil_pemilihan_suara'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById('myChart4').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: [<?php while ($c4 = mysqli_fetch_array($calon4)) {
                    echo '"' . $c4['hasil_pemilihan_calon'] . '",';
                  } ?>],
        datasets: [{
          label: 'Data Hasil Sementara Suara Terkumpul RT 04',
          backgroundColor: ['rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)'],
          borderColor: ['rgb(255, 255, 0)'],
          data: [<?php while ($s4 = mysqli_fetch_array($suara4)) {
                    echo '"' . $s4['hasil_pemilihan_suara'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById('myChart5').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: [<?php while ($c5 = mysqli_fetch_array($calon5)) {
                    echo '"' . $c5['hasil_pemilihan_calon'] . '",';
                  } ?>],
        datasets: [{
          label: 'Data Hasil Sementara Suara Terkumpul RT 05',
          backgroundColor: ['rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)'],
          borderColor: ['rgb(0, 255, 255)'],
          data: [<?php while ($s5 = mysqli_fetch_array($suara5)) {
                    echo '"' . $s5['hasil_pemilihan_suara'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <script>
    var ctx = document.getElementById('myChartgolput1').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: ['RT 01'],
        datasets: [{
          label: 'Data warga yang belum memilih RT 01 ',
          backgroundColor: ['rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)', 'rgb(0, 0, 102)'],
          borderColor: ['rgb(0, 0, 102)'],
          data: [<?php while ($g1 = mysqli_fetch_array($golput1)) {
                    echo '"' . $g1['hasil_pemilihan_golput'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById('myChartgolput2').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: ['RT 02'],
        datasets: [{
          label: 'Data warga yang belum memilih RT 02 ',
          backgroundColor: ['rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)'],
          borderColor: ['rgb(255, 0, 0)'],
          data: [<?php while ($g2 = mysqli_fetch_array($golput2)) {
                    echo '"' . $g2['hasil_pemilihan_golput'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById('myChartgolput3').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: ['RT 03'],
        datasets: [{
          label: 'Data warga yang belum memilih RT 03 ',
          backgroundColor: ['rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)','rgb(0, 255, 0)'],
          borderColor: ['rgb(0, 255, 0)'],
          data: [<?php while ($g3 = mysqli_fetch_array($golput3)) {
                    echo '"' . $g3['hasil_pemilihan_golput'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById('myChartgolput4').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: ['RT 04'],
        datasets: [{
          label: 'Data warga yang belum memilih RT 04 ',
          backgroundColor: ['rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)','rgb(255, 255, 0)'],
          borderColor: ['rgb(255, 255, 0)'],
          data: [<?php while ($g4 = mysqli_fetch_array($golput4)) {
                    echo '"' . $g4['hasil_pemilihan_golput'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById('myChartgolput5').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',
      // The data for our dataset
      data: {
        labels: ['RT 05'],
        datasets: [{
          label: 'Data warga yang belum memilih RT 05 ',
          backgroundColor: ['rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)','rgb(0, 255, 255)'],
          borderColor: ['rgb(0, 255, 255)'],
          data: [<?php while ($g5 = mysqli_fetch_array($golput5)) {
                    echo '"' . $g5['hasil_pemilihan_golput'] . '",';
                  } ?>]
        }]
      },

      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>

</html>