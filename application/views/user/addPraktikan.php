<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class=""><a href="#addSingle" data-toggle="tab">Praktikan/Asisten Manual</a></li>
    <li class="active"><a href="#uploadPraktikan" data-toggle="tab">Praktikan via Excel</a></li>
    <!--
    <li><a href="#skta" data-toggle="tab">Kelayakan Tugas Akhir</a></li>
  -->
</ul>
<div class="tab-content">
  <!-- /.tab-pane -->
  <!-- /.tab-pane -->

  <!-- /.tab pane-->
  <div class="active tab-pane" id="uploadPraktikan">

    <form class="form-horizontal" method="post" enctype="multipart/form-data">

      <div class="alert alert-info rt-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Petunjuk </h4>
        Silahkan upload file berformat .xls
        <br>
      </div>

      <div class="form-group">
        <label for="bukti" class="col-sm-2 control-label">Upload File</label>
        <div class="col-sm-10">
          <input type="file" name="files" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="addPraktikan" value="addPraktikan">Upload Akun</button>
        </div>
      </div>

    </form>
  </div>

  <div class=" tab-pane" id="addSingle">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">

      <div class="alert alert-info rt-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Petunjuk </h4>
        Pilih mahasiswa dan pilih posisi yang diinginkan (praktikan/asisten)
        <br>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Posisi</label>
          <div class="col-sm-10">
            <select class="form-control" name="role">
              <option value="2" >Praktikan</option>
              <option value="3" >Asisten</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Nama Mahasiswa</label>
          <div class="col-sm-10">
            <select class="form-control select2" style="width: 100%;" name="id_user">
              <?php foreach ($user as $item): ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="addRole" value="addRole">Tambahkan</button>
        </div>
      </div>

    </form>
  </div>

  <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
