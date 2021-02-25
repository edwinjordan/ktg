 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Klaim Garansi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List Garansi</a></li>
              <li class="breadcrumb-item active">Klaim Garansi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Klaim Garansi Barang</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Garansi/input_klaim_garansi/');?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Kode Garansi</label>
                            <input type="text" name="kdgaransi" class="form-control" placeholder="No. PO" value="<?= $barang_garansi->fc_kdgaransi ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Indikasi Kerusakan</label>
                            <input type="text" name="indikasi_kerusakan" class="form-control" placeholder="Indikasi Kerusakan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Foto Kerusakan</label>
                            <input type="file" name="foto_rusak" class="form-control" placeholder="Foto Kerusakan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Kerusakan</label>
                            <input type="date" name="tgl_rusak" class="form-control" placeholder="Tanggal Kerusakan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Jabatan Pelapor</label>
                            <input type="text" name="jabatan_pelapor" class="form-control" placeholder="Jabatan Pelapor" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Luasan Kerusakan</label>
                            <input type="text" name="luasan_rusak" class="form-control" placeholder="Luasan Kerusakan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Lapor</label>
                            <input type="date" name="tgl_lapor" class="form-control" placeholder="Tanggal Lapor" required>
                        </div>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit Klaim Garansi</a>
        </div>
      <?php echo form_close(); ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
