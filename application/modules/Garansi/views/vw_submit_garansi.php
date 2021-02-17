 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Submit Garansi Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h3 class="card-title">Submit Garansi Barang</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Garansi/input_submit_garansi/'.$idpo);?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">No. PO & No. SJ</label>
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?= $po_data->fc_kdpo ?>" required readonly>
                            <input type="text" name="nosj" class="form-control" placeholder="No. SJ" value="<?= $po_data->fc_kdsj ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Contact Owner</label>
                            <input type="text" name="contact_owner" class="form-control" placeholder="Contact Owner" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Kirim KTG</label>
                            <input type="date" name="tgl_kirim" class="form-control" placeholder="Tanggal Kirim KTG" value="<?= $po_data->fd_target_tglkirim ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Pemasangan</label>
                            <input type="date" name="tgl_pasang" class="form-control" placeholder="Tanggal Pemasangan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Lokasi Project</label>
                            <input type="text" name="lokasi_project" class="form-control" placeholder="Lokasi Project" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Jenis Project</label>
                            <input type="text" name="jns_project" class="form-control" placeholder="Jenis Project" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang->fv_nmbarang ?>" required readonly>
                            <input type="hidden" name="kode_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang->fc_kdbarang ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Luasan Project</label>
                            <input type="text" name="luasan_project" class="form-control" placeholder="Luasan Project" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">No. SJ Distributor & Foto SJ</label>
                            <input type="text" name="sj_distributor" class="form-control" placeholder="No. SJ Distributor" required>
                            <input type="file" name="foto_sj" class="form-control" placeholder="Foto No. SJ" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Gambar Panel (pdf)</label>
                            <input type="file" name="gmbr_panel" class="form-control" placeholder="Gambar Panel (pdf)" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Nama Owner Project</label>
                            <input type="text" name="nama_owner" class="form-control" placeholder="Nama Owner Project" required>
                        </div>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit Garansi Barang</a>
        </div>
      <?php echo form_close(); ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
