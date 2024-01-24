<?php
if (isset($_GET['id'])) {
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"data_penduduk","id_penduduk='$kode'"));
}
?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data penduduk</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="penduduk_proses.php" method="post">

            <div class="card-body">

            <input type="hidden" name="id_penduduk" value="<?=@$id_penduduk?>">

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Nama penduduk</label>
              <input type="text" name="nama" class="form-control col-sm-7" value="<?=@$nama?>" placeholder="Inputkan Nama" required="yes">
            </div>

            <div class="form-group row">
              <label for="nik" class="col-sm-3">NIK</label>
              <input type="number" name="nik" class="form-control col-sm-7" value="<?=@$nik?>" placeholder="Inputkan Nik" required="yes">
            </div>

            <div class="form-group row">
              <label for="alamat" class="col-sm-3">Alamat</label>
              <input type="text" name="alamat" class="form-control col-sm-7" value="<?=@$alamat?>" placeholder="Inputkan Alamat" required="yes">
            </div>

            <div class="form-group row">
              <label for="no_telp" class="col-sm-3">No. Telp</label>
              <input type="number" name="no_telp" maxlength='16' class="form-control col-sm-7" value="<?=@$no_telp?>" placeholder="Inputkan No Telp (08xxxxxxxxx)">
            </div>

          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
            class="btn btn-primary" value="Simpan">
            <a href="?hal=penduduk" class="btn btn-default">
              Batal
            </a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->