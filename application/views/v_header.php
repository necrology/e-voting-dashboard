<!--Counter Inbox-->
<header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img width="40" height="40" src="<?php echo base_url() . 'assets/images/voting.png' ?>"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">E-VOTING RW 02</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_admin WHERE admin_id='$id_admin'");
              $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/'.$c['admin_photo'];?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['admin_nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/'.$c['admin_photo'];?>" class="img-circle" alt="">

                <p>
                  <?php echo $c['admin_nama'];?>
                  <?php if($c['admin_level']=='1'):?>
                    <small>Administrator</small>
                  <?php else:?>
                    <small>Author</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a data-toggle="modal" data-target="#ModalLogout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
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