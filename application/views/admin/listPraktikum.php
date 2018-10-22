<div class="box">
    <div class="box-header">
      <h3 class="box-title">Rekap Praktikum</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
          <th>Nama Praktikum</th>
          <th>Semester</th>
          <th>Opsi</th>

        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($praktikum as $item) : ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $item->praktikum_name." ".$item->year; ?></td>
          <td><?php if($item->semester == 0){echo "Genap";} else {echo "Ganjil";} ?></td>
          <td><a href="<?php echo base_url('detailPraktikum/'.$item->id);?>">Detail</a></td>
        </tr>
        <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
          <th>No.</th>
          <th>Nama Praktikum</th>
          <th>Semester</th>
          <th>Opsi</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
