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
        <li class="active"><a href="#praktikan" data-toggle="tab">Praktikan</a></li>
        <li ><a href="#asisten" data-toggle="tab">Asisten</a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="praktikan">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>shift</th>
                <th>kelompok</th>
                <th>Opsi</th>

              </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($list as $item) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item->pic_id; ?></td>
                <td><?php echo $item->fullname; ?></td>
                <td><?php echo $item->shift; ?></td>
                <td><?php echo $item->kelompok; ?></td>
                <td><a href="<?php echo base_url('deletePraktikan/'.$item->id);?>">Hapus</a></td>
              </tr>
              <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>shift</th>
                <th>kelompok</th>
                <th>Opsi</th>

              </tr>
              </tfoot>
            </table>
          </div>

        </div>

        <div class="tab-pane" id="asisten">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Opsi</th>

              </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($asist as $item) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item->pic_id; ?></td>
                <td><?php echo $item->fullname; ?></td>
                <td><a href="<?php echo base_url('deleteAsist/'.$item->id);?>">Hapus Asisten</a></td>
              </tr>
              <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
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
