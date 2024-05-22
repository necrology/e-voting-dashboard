<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD E-VOTING RW 02 | Data Calon Ketua RT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url() . 'assets/images/voting.png' ?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>" />
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

          <li class="active">
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
          Data Calon Ketua RT
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-bar-chart"></i> Dashboard</a></li>
          <li class="active">Data Calon Ketua RT</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Tambah Data Calon Ketua RT</a>
                  <a class="btn btn-danger btn-flat" data-toggle="modal" data-target="#ModalHapusSemua"><span class="fa fa-trash"></span> Hapus Semua Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>No Urut</th>
                        <th>Nama</th>
                        <th>No NIK</th>
                        <th>No KK</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Agama</th>
                        <th>RT</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th style="text-align:center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data->result_array() as $i) :
                        $id_calon = $i['id_calon'];
                        $photo_calon = $i['photo_calon'];
                        $urut_calon = $i['calonNo_urut'];
                        $nama_calon = $i['nama_calon'];
                        $noNik_calon = $i['noNik_calon'];
                        $noKK_calon = $i['noKK_calon'];
                        $jenisKelamin_calon = $i['jenisKelamin_calon'];
                        $tempatLahir_calon = $i['tempatLahir_calon'];
                        $tglLahir_calon = $i['tglLahir_calon'];
                        $umur = $i['umur_calon'];
                        $agama_calon = $i['agama_calon'];
                        $visi = $i['visi_calon'];
                        $misi = $i['misi_calon'];
                        $rt = $i['rt'];
                      ?>
                        <tr>
                          <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo_calon; ?>"></td>
                          <td><?php echo $urut_calon; ?></td>
                          <td><?php echo $nama_calon; ?></td>
                          <td><?php echo $noNik_calon; ?></td>
                          <td><?php echo $noKK_calon; ?></td>
                          <?php if ($jenisKelamin_calon == 'L') : ?>
                            <td>Laki-Laki</td>
                          <?php else : ?>
                            <td>Perempuan</td>
                          <?php endif; ?>
                          <td><?php echo $tempatLahir_calon; ?></td>
                          <td><?php echo $tglLahir_calon; ?></td>
                          <td><?php echo $umur; ?></td>
                          <td><?php echo $agama_calon; ?></td>
                          <td><?php echo $rt; ?></td>
                          <td><?php echo $visi; ?></td>
                          <td><?php echo $misi; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_calon; ?>"><span class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_calon; ?>"><span class="fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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

  <!--Modal Add Calon-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data Calon Ketua RT</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'calon/simpan_calon' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputnama" class="col-sm-4 control-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" maxlength="20" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputnik" class="col-sm-4 control-label">No NIK</label>
              <div class="col-sm-7">
                <input type="text" maxlength="17" name="xnik" class="form-control" id="inputUserName" placeholder="Nomor NIK" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputkk" class="col-sm-4 control-label">No KK</label>
              <div class="col-sm-7">
                <input type="text" maxlength="17" name="xkk" class="form-control" id="inputUserName" placeholder="Nomor KK" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputjenkel" class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-7">
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                  <label for="inlineRadio1"> Laki-Laki </label>
                </div>
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                  <label for="inlineRadio2"> Perempuan </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputtempatlahir" class="col-sm-4 control-label">Tempat Lahir</label>
              <div class="col-sm-7">
                <input type="text" maxlength="20" name="xtmp_lahir" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputtanggallahir" class="col-sm-4 control-label">Tanggal Lahir</label>
              <div class="col-sm-7">
                <input type="date" name="xtgl_lahir" class="form-control" id="inputUserName" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputagama" class="col-sm-4 control-label">Agama</label>
              <div class="col-sm-7">
                <input type="text" maxlength="20" name="xagama" class="form-control" id="inputUserName" placeholder="Agama" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputcalonketuart" class="col-sm-4 control-label">Calon Ketua RT</label>
              <div class="col-sm-7">
                <select class="form-control" name="xrt" required>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputcalonurut" class="col-sm-4 control-label">Calon No URUT</label>
              <div class="col-sm-7">
                <input type="text" maxlength="2" name="xurut" class="form-control" id="inputUserName" placeholder="No Urut" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputvisi" class="col-sm-4 control-label">Visi</label>
              <div class="col-sm-7">
                <textarea class="form-control" name="xvisi" id="exampleFormControlTextarea1" placeholder="Visi Calon Ketua RT" rows="3" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputmisi" class="col-sm-4 control-label">Misi</label>
              <div class="col-sm-7">
                <textarea class="form-control" name="xmisi" id="exampleFormControlTextarea1" placeholder="Misi Calon Ketua RT" rows="3" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputphoto" class="col-sm-4 control-label">Photo</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto"/>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php foreach ($data->result_array() as $i) :
    $id_calon = $i['id_calon'];
    $photo_calon = $i['photo_calon'];
    $urut_calon = $i['calonNo_urut'];
    $nama_calon = $i['nama_calon'];
    $noNik_calon = $i['noNik_calon'];
    $noKK_calon = $i['noKK_calon'];
    $jenisKelamin_calon = $i['jenisKelamin_calon'];
    $tempatLahir_calon = $i['tempatLahir_calon'];
    $tglLahir_calon = $i['tglLahir_calon'];
    $umur = $i['umur_calon'];
    $agama_calon = $i['agama_calon'];
    $visi = $i['visi_calon'];
    $misi = $i['misi_calon'];
    $rt = $i['rt'];
  ?>
    <!--Modal Edit Calon-->
    <div class="modal fade" id="ModalEdit<?php echo $id_calon; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Calon Ketua RT</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'calon/update_calon' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputnama" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-7">
                <input type="hidden" name="kode" value="<?php echo $id_calon; ?>" />
                  <input type="text" maxlength="20" name="xnama" class="form-control" id="inputUserName" value="<?php echo $nama_calon;?>" placeholder="Nama Lengkap" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputnik" class="col-sm-4 control-label">No NIK</label>
                <div class="col-sm-7">
                  <input type="text" maxlength="17" name="xnik" class="form-control" id="inputUserName" value="<?php echo $noNik_calon;?>" placeholder="Nomor NIK" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputkk" class="col-sm-4 control-label">No KK</label>
                <div class="col-sm-7">
                  <input type="text" maxlength="17" name="xkk" class="form-control" id="inputUserName" value="<?php echo $noKK_calon;?>" placeholder="Nomor KK" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjenkel" class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-7">
                  <?php if ($jenisKelamin_calon == 'L') : ?>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                      <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                      <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  <?php else : ?>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                      <label for="inlineRadio1"> Laki-Laki </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                      <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputtempatlahir" class="col-sm-4 control-label">Tempat Lahir</label>
                <div class="col-sm-7">
                  <input type="text" maxlength="20" name="xtmp_lahir" class="form-control" id="inputUserName" value="<?php echo $tempatLahir_calon;?>" placeholder="Tempat Lahir" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputtanggallahir" class="col-sm-4 control-label">Tanggal Lahir</label>
                <div class="col-sm-7">
                  <input type="date" name="xtgl_lahir" class="form-control" value="<?php echo $tglLahir_calon;?>" id="inputUserName" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputagama" class="col-sm-4 control-label">Agama</label>
                <div class="col-sm-7">
                  <input type="text" maxlength="20" name="xagama" class="form-control" id="inputUserName" value="<?php echo $agama_calon;?>" placeholder="Agama" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputrt" class="col-sm-4 control-label">RT</label>
                <div class="col-sm-7">
                  <select class="form-control" name="xrt" required>
                    <?php if ($rt == '1') : ?>
                      <option value="1" selected>01</option>
                      <option value="2">02</option>
                      <option value="3">03</option>
                      <option value="4">04</option>
                      <option value="5">05</option>
                    <?php elseif ($rt == '2') : ?>
                      <option value="1">01</option>
                      <option value="2" selected>02</option>
                      <option value="3">03</option>
                      <option value="4">04</option>
                      <option value="5">05</option>
                    <?php elseif ($rt == '3') : ?>
                      <option value="1">01</option>
                      <option value="2">02</option>
                      <option value="3" selected>03</option>
                      <option value="4">04</option>
                      <option value="5">05</option>
                    <?php elseif ($rt == '4') : ?>
                      <option value="1">01</option>
                      <option value="2">02</option>
                      <option value="3">03</option>
                      <option value="4" selected>04</option>
                      <option value="5">05</option>
                    <?php else : ?>
                      <option value="1">01</option>
                      <option value="2">02</option>
                      <option value="3">03</option>
                      <option value="4">04</option>
                      <option value="5" selected>05</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputurut" class="col-sm-4 control-label">Calon No Urut</label>
                <div class="col-sm-7">
                  <input type="text" maxlength="2" name="xurut" class="form-control" id="inputUserName" value="<?php echo $urut_calon;?>" placeholder="No Urut" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputvisi" class="col-sm-4 control-label">Visi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="xvisi" id="exampleFormControlTextarea1" placeholder="Visi Calon Ketua RT" rows="3" required><?php echo $visi;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputmisi" class="col-sm-4 control-label">Misi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="xmisi" id="exampleFormControlTextarea1" placeholder="Misi Calon Ketua RT" rows="3" required><?php echo $misi;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputphoto" class="col-sm-4 control-label">Photo</label>
                <div class="col-sm-7">
                  <input type="file" name="filefoto"/>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($data->result_array() as $i) :
    $id_calon = $i['id_calon'];
    $photo_calon = $i['photo_calon'];
    $nama_calon = $i['nama_calon'];
    $noNik_calon = $i['noNik_calon'];
    $noKK_calon = $i['noKK_calon'];
    $jenisKelamin_calon = $i['jenisKelamin_calon'];
    $tempatLahir_calon = $i['tempatLahir_calon'];
    $tglLahir_calon = $i['tglLahir_calon'];
    $umur = $i['umur_calon'];
    $agama_calon = $i['agama_calon'];
    $visi = $i['visi_calon'];
    $misi = $i['misi_calon'];
    $rt = $i['rt'];
  ?>
    <!--Modal Hapus Calon-->
    <div class="modal fade" id="ModalHapus<?php echo $id_calon; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data Calon Ketua RT</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'calon/hapus_calon' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id_calon; ?>" />
              <p>Apakah anda yakin ingin menghapus calon ketua RT <b><?php echo $nama_calon; ?></b> ?</p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!--Modal Hapus Semua Data-->
  <div class="modal fade" id="ModalHapusSemua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Semua Data Calon Ketua RT</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'calon/hapus_semua_calon' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus semua data calon Ketua RT ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
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
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
  <!-- page script -->
  <script>
    $(function() {
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
  <?php if ($this->session->flashdata('msg') == 'error') : ?>
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
  <?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Warning',
        text: "Gambar yang Anda masukan terlalu besar.",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FFC017'
      });
    </script>
    <?php elseif ($this->session->flashdata('msg') == 'duplikasi') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Warning',
        text: "Data yang dimasukan sudah ada",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FF4859'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Data calon ketua RT berhasil disimpan.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript"> 
      $.toast({
        heading: 'Info',
        text: "Data calon ketua RT berhasil diupdate.",
        showHideTransition: 'slide',
        icon: 'info',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#00C9E6'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Data calon ketua RT Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'show-modal') : ?>
    <script type="text/javascript">
      $('#ModalResetPassword').modal('show');
    </script>
  <?php else : ?>

  <?php endif; ?>
</body>

</html>