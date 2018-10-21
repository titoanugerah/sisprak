<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#createSingle" data-toggle="tab">Satu Akun</a></li>
    <li><a href="#uploadAccount" data-toggle="tab">Upload Dari Excel</a></li>
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
        <label for="inputName" class="col-sm-2 control-label">NIM</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Masukan NIM" name="pic_id" value="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="createSingleAccount" value="createSingleAccount">Simpan Data</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.tab pane-->
  <div class="tab-pane" id="uploadAccount">

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
          <button type="submit" class="btn btn-info" name="uploadAccount" value="uploadAccount">Upload Akun</button>
        </div>
      </div>

    </form>
  </div>


  <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
