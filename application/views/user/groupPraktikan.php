<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editModul" data-toggle="tab">Edit Modul</a></li>
        <li ><a href="#uploadFile" data-toggle="tab">Upload File</a></li>
        <li ><a href="#fileDownload" data-toggle="tab">File</a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="editModul">
          <form class="form-horizontal" method="post">

            
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
                      <option value="Modul" >Modul</option>
                      <option value="Tugas Pendahuluan" >Tugas Pendahuluan</option>
                      <option value="File Pendukung" >File Pendukung</option>
                      <option value="Tugas" >Tugas</option>
                      <option value="Format Laporan" >Format Laporan</option>
                      <option value="File Lain" >Lain Lain</option>
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

        <div class="tab-pane" id="fileDownload">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Jenis File</th>
                <th>Nama File</th>
                <th>Opsi</th>

              </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($file as $item) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item->type; ?></td>
                <td><?php echo $item->filename; ?></td>
                <td><a href="<?php echo base_url('download/'.$item->filename);?>">Download</a></td>
              </tr>
              <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Jenis File</th>
                <th>Nama File</th>
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
