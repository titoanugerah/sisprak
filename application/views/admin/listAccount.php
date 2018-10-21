<div class="box">
    <div class="box-header">
      <h3 class="box-title">Rekap Akun</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Status Update</th>
          <th>Opsi</th>

        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($account as $item) : ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $item->pic_id; ?></td>
          <td><?php echo $item->fullname; ?></td>
          <td><?php if($item->status == 0){echo "Belum dilengkapi";} else {"Sudah Dilengkapi";} ?></td>
          <td><a href="<?php echo base_url('detailAccount/'.$item->id);?>">Detail</a></td>
        </tr>
        <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Status Update</th>
          <th>Opsi</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
