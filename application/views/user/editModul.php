<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editModul" data-toggle="tab">Edit Modul</a></li>
        <li ><a href="#uploadFile" data-toggle="tab">Upload File</a></li>
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
                <button type="submit" class="btn btn-danger" name="deleteModul" value="deleteModul">Hapus Modul</button>
                <button type="submit" class="btn btn-success" name="updateModul" value="updateModul">Simpan Data</button>
                <button type="submit" class="btn btn-primary" name="back" value="back">Kembali</button>
              </div>
            </div>
          </form>

        </div>

        <div class="tab-pane" id="uploadFile">
          <div class="box-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">

              <div class="alert alert-info rt-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Petunjuk </h4>
                Silahkan upload file
                <br>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Upload</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="type">
                      <option value="0" >Modul</option>
                      <option value="1" >Tugas Pendahuluan</option>
                      <option value="2" >File Pendukung</option>
                      <option value="3" >Tugas</option>
                      <option value="4" >Format Laporan</option>
                      <option value="5" >Lain Lain</option>
                    </select>
                  </div>
                </div>

              <div class="form-group">
                <label for="bukti" class="col-sm-2 control-label">Upload File</label>
                <div class="col-sm-10">
                  <input type="file" name="files" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-info" name="uploadFile" value="uploadFile">Upload</button>
                </div>
              </div>

            </form>

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
