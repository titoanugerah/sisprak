<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#createSingle" data-toggle="tab">Form Tambah Praktikum</a></li>
    <!--
    <li><a href="#skta" data-toggle="tab">Kelayakan Tugas Akhir</a></li>
  -->
</ul>
<div class="tab-content">
  <!-- /.tab-pane -->
  <!-- /.tab-pane -->

  <div class="active tab-pane" id="createSingle">
    <form class="form-horizontal" method="post">
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Nama Praktikum</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Masukan Nama Praktikum" name="praktikum_name" value="">
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Tahun</label>
        <div class="col-sm-10">
          <input type="Number" class="form-control" placeholder="Masukan Tahun Dilaksanakannya Praktikum" name="year" value="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Semester</label>
          <div class="col-sm-10">
            <select class="form-control" name="semester">
              <option value="0" >Genap</option>
              <option value="1" >Ganjil</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Koor Praktikum</label>
          <div class="col-sm-10">
            <select class="form-control select2" style="width: 100%;" name="id_koor">
              <?php foreach ($user as $item): ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->fullname."  (Angkatan 20".$item->pic_id[6].$item->pic_id[7].")";?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="addPraktikum" value="addPraktikum">Simpan Data</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.tab pane-->


  <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
