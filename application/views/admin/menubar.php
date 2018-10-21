<ul class="sidebar-menu">
  <li class="header">Main Menu</li>

  <li>
    <a href="<?php echo base_url('dashboard')?>">
      <i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['privilleges']; ?></span>
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-users"></i> <span>Akun</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url('listAccount');?>"><i class="fa fa-user"></i> Rekap Akun</a></li>
      <li><a href="<?php echo base_url('addAccount');?>"><i class="fa fa-plus"></i> Tambah Akun</a></li>
    </ul>
  </li>

  <li class="active treeview">
    <a href="#">
      <i class="fa fa-newspaper-o"></i> <span>Rekap</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url('parkReport');?>"><i class="fa fa-car"></i> Parking</a></li>
    </ul>
  </li>


</ul>
