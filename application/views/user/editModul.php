<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editModul" data-toggle="tab">Edit Modul</a></li>
        <li ><a href="#listFile" data-toggle="tab">File Modul dan Keperluan</a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="editModul">
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Modul</label>
              <div class="col-sm-10">
                <input type="Number" class="form-control" placeholder="Masukan nomor modul praktikum" name="modul" value="<?php echo $detail->modul; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Modul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan Nama Modul" name="nama_modul" value="<?php echo $detail->nama_modul; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asisten 1</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;" name="id_asisten_1">
                  <?php foreach ($user as $item): ?>
                    <option value="<?php echo $item->id_user; ?>"<?php if($item->id_user==$detail->id_asisten_1){echo "selected";} ?>><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asisten 2</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;" name="id_asisten_2">
                  <?php foreach ($user as $item): ?>
                    <option value="<?php echo $item->id_user; ?>" <?php if($item->id_user==$detail->id_asisten_2){echo "selected";} ?>><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Praktikum</label>
              <div class="col-sm-10">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date"  data-date-format='yy-mm-dd' class="form-control pull-right" name="tanggal" value="<?php echo $detail->tanggal; ?>">
              </div>
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="addModul" value="addModul">Simpan Data</button>
              </div>
            </div>
          </form>

        </div>

        <div class="tab-pane" id="listFile">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Nama Modul</th>
                <th>Asisten 1</th>
                <th>Asisten 2</th>
                <th>Tanggal </th>
                <th>Opsi</th>

              </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($modul1 as $item1) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo "Modul ".$item1->modul." : ".$item1->nama_modul; ?></td>
                <td><?php echo $item1->asisten_1; ?></td>
                <td><?php echo $item1->asisten_2; ?></td>
                <td><?php echo $item1->tanggal; ?></td>
                <td><a href="<?php echo base_url('editModul/'.$item1->id);?>">Edit</a></td>
              </tr>
              <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Modul</th>
                <th>Asisten 1</th>
                <th>Asisten 2</th>
                <th>Tanggal </th>
                <th>Opsi</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
