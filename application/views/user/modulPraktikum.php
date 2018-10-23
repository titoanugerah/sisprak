<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-danger">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $detail->praktikum_name; ?></h3>

        <p class="text-muted text-center"><?php echo $detail->year ?></p>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Tentang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-list margin-r-5"></i> Semester</strong>

        <p class="text-muted">
          <?php if($detail->semester==0){echo "Genap";} else { echo "Ganjil";} ?>
        </p>

        <hr>

        <strong><i class="fa fa-users margin-r-5"></i>Jumlah Praktikan</strong>

        <p class="text-muted"><?php echo $detail->praktikan." Praktikan"; ?></p>

        <hr>


        <strong><i class="fa fa-user-secret margin-r-5"></i>Koordinator</strong>

        <p class="text-muted"><?php echo $detail->koordinator; ?></p>
        <hr>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#addModul" data-toggle="tab">Tambah Modul Baru</a></li>
        <li ><a href="#modul" data-toggle="tab">List Modul</a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="addModul">
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Modul</label>
              <div class="col-sm-10">
                <input type="Number" class="form-control" placeholder="Masukan nomor modul praktikum" name="modul" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Modul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan Nama Modul" name="nama_modul" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asisten 1</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;" name="id_asisten_1">
                  <?php foreach ($user as $item): ?>
                    <option value="<?php echo $item->id_user; ?>"><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asisten 2</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;" name="id_asisten_2">
                  <?php foreach ($user as $item): ?>
                    <option value="<?php echo $item->id_user; ?>"><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
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
                <input type="date"  data-date-format='yy-mm-dd' class="form-control pull-right" name="tanggal">
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

        <div class="tab-pane" id="modul">
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
