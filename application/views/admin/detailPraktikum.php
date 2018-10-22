<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $praktikum->praktikum_name; ?></h3>

        <p class="text-muted text-center">Tahun <?php echo $praktikum->year; ?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>semester</b> <a class="pull-right"><?php if($praktikum->semester == 0){ echo "Genap";} else {echo "Ganjil";} ?></a>
          </li>
        </ul>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tentang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-user margin-r-5"></i> Nama Admin</strong>
        <p class="text-muted">
          <?php echo $praktikum->dosen; ?>
        </p>
        <hr>
        <strong><i class="fa fa-envelope margin-r-5"></i>Nama Koor Praktikum</strong>
        <p class="text-muted"><?php echo $praktikum->koordinator; ?></p>


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
        <li class="active"><a href="#editPraktikum" data-toggle="tab">Edit Praktikum</a></li>
        <!--
        <li><a href="#skkp" data-toggle="tab">Kelayakan Kerja Praktik</a></li>
        <li><a href="#skta" data-toggle="tab">Kelayakan Tugas Akhir</a></li>
      -->
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="editPraktikum">
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Praktikum</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan Nama Praktikum" name="praktikum_name" value="<?php echo $praktikum->praktikum_name; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Tahun</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Masukan Tahun Pelaksanaan Praktikum" name="year" value="<?php echo $praktikum->year; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Semester</label>
                <div class="col-sm-10">
                  <select class="form-control" name="semester">
                    <option value="0" <?php if($praktikum->semester==0){echo "Selected";} ?>>Genap</option>
                    <option value="1" <?php if($praktikum->semester==1){echo "Selected";} ?>>Ganjil</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Koor Praktikum</label>
                <div class="col-sm-10">
                  <select class="form-control select2" style="width: 100%;" name="id_koor">
                    <?php foreach ($user as $item): ?>
                      <option value="<?php echo $item->id; ?>"<?php if($item->id==$praktikum->id_koor){echo "Selected";} ?>><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updatePraktikum" value="updatePraktikum">Simpan Data</button>
                <button type="submit" class="btn btn-danger" name="deletePraktikum" value="deletePraktikum">Hapus Praktikum</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab pane-->
        <div class="tab-pane" id="skkp">
          <div class="alert alert-info rt-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Under Development Process </h4>
              Konten ini sedang dalam masa pengembangan
            <br>
          </div>
        </div>

        <div class="tab-pane" id="skta">
          <form class="form-horizontal" method="post">

            <div class="alert alert-info rt-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Under Development Process </h4>
                Konten ini sedang dalam masa pengembangan
              <br>
            </div>

            <!--
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info" name="createKTA" value="createKTA">Proses Permintaan Tugas Akhir</button>
              </div>
            </div>
          -->
          </form>
        </div>


        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
