<ul class="sidebar-menu">
  <li class="header">Main Menu</li>

  <li>
    <a href="<?php echo base_url('dashboard')?>">
      <i class="fa fa-th"></i> <span>Dashboard <?php echo $this->session->userdata['privilleges']; ?></span>
    </a>
  </li>

  <?php foreach ($praktikum as $item) : ?>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-car"></i><span><?php echo $item->praktikum_name; ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <?php if ($item->role==1): ?>
        <li><a href="<?php echo base_url('addPraktikan/'.$item->id); ?>"><i class="fa fa-plus"></i>Tambah Praktikan & Asisten</a></li>
        <li><a href="<?php echo base_url('listPraktikan/'.$item->id); ?>"><i class="fa fa-user"></i>Rekap Praktikan & Asisten</a></li>
        <li><a href="<?php echo base_url('modulPraktikum/'.$item->id); ?>"><i class="fa fa-book"></i>Modul Praktikum</a></li>
        <li><a href="<?php echo base_url('groupPraktikan/'.$item->id); ?>"><i class="fa fa-users"></i>Rekap Kelompok</a></li>
      <?php elseif($item->role==3) : ?>
        <li><a href="<?php echo base_url('modul/'.$item->id); ?>"><i class="fa fa-users"></i>Modul</a></li>

      <?php endif; ?>

    </ul>
  </li>
<?php  endforeach; ?>

</ul>
