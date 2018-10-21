<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo "@".$account->username; ?></h3>

        <p class="text-muted text-center">Teknik Komputer 20<?php echo $account->pic_id[6].$account->pic_id[7]; ?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>NIM</b> <a class="pull-right"><?php echo $account->pic_id; ?></a>
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
        <strong><i class="fa fa-user margin-r-5"></i> Nama Panjang</strong>
        <p class="text-muted">
          <?php echo $account->fullname; ?>
        </p>
        <hr>
        <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
        <p class="text-muted"><?php echo $account->email; ?></p>


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
        <li class="active"><a href="#editMahasiswa" data-toggle="tab">Edit Akun</a></li>
        <!--
        <li><a href="#skkp" data-toggle="tab">Kelayakan Kerja Praktik</a></li>
        <li><a href="#skta" data-toggle="tab">Kelayakan Tugas Akhir</a></li>
      -->
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->
        <!-- /.tab-pane -->

        <div class="active tab-pane" id="editMahasiswa">
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan NIM" name="nim" value="<?php echo $account->pic_id; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan username mahasiswa" name="username" value="<?php echo $account->username; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Panjang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan nama panjang mahasiswa" name="fullname" value="<?php echo $account->fullname; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Masukan email mahasiswa" name="email" value="<?php echo $account->email; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan NIM" name="pic_id" value="<?php echo $account->pic_id; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateAcount" value="updateAcount">Simpan Data</button>
                <button type="submit" class="btn btn-info" name="resetPasswordAccount" value="resetPasswordAccount">Reset password</button>
                <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Akun</button>
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
