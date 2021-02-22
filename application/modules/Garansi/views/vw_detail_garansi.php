 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengajuan Garansi</h1>
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
          <h3 class="card-title">Detail Pengajuan Garansi Kode <?= $garansi_data->fc_kdgaransi ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">No. PO & No. SJ</label>
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?= $garansi_data->fc_kdpo ?>" required readonly>
                            <input type="text" name="nosj" class="form-control" placeholder="No. SJ" value="<?= $garansi_data->fc_kdsj ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Kode Garansi</label>
                            <input type="text" name="kdgaransi" class="form-control" placeholder="No. PO" value="<?= $garansi_data->fc_kdgaransi ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Contact Owner</label>
                            <input type="text" name="contact_owner" class="form-control" placeholder="Contact Owner" value="<?= $garansi_data->	fc_contact_owner ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Kirim KTG</label>
                            <input type="date" name="tgl_kirim" class="form-control" placeholder="Tanggal Kirim KTG" value="<?= $garansi_data->fd_target_tglkirim ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Pemasangan</label>
                            <input type="date" name="tgl_pasang" class="form-control" placeholder="Tanggal Pemasangan" value="<?= $garansi_data->fd_tgl_pemasangan ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Lokasi Project</label>
                            <input type="text" name="lokasi_project" class="form-control" placeholder="Lokasi Project" value="<?= $garansi_data->fv_lokasi_project ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Jenis Project</label>
                            <input type="text" name="jns_project" class="form-control" placeholder="Jenis Project" value="<?= $garansi_data->fv_jenis_project ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Luasan Project</label>
                            <input type="text" name="luasan_project" class="form-control" placeholder="Luasan Project" value="<?= $garansi_data->fv_luasan_project ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">No. SJ Distributor & Foto SJ</label>
                            <input type="text" name="sj_distributor" class="form-control" placeholder="No. SJ Distributor" value="<?= $garansi_data->fc_sjno_distributor ?>" readonly>
                            <a href="<?= base_url('Garansi/download_foto_sj/'.$garansi_data->fc_kdgaransi) ?>" class="form-control btn-primary">Download</a>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Gambar Panel (pdf)</label>
                          <a href="<?= base_url('Garansi/download_foto_panel/'.$garansi_data->fc_kdgaransi) ?>" class="form-control btn-primary">Download</a>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Nama Owner Project</label>
                            <input type="text" name="nama_owner" class="form-control" placeholder="Nama Owner Project" value="<?= $garansi_data->fv_nmowner_project ?>" readonly>
                        </div>


                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Indikasi Kerusakan</label>
                            <input type="text" name="indikasi_kerusakan" class="form-control" placeholder="Indikasi Kerusakan" value="<?= $garansi_data->fv_indikasi_kerusakan ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Foto Kerusakan</label>
                          <a href="<?= base_url('Garansi/download_foto_rusak/'.$garansi_data->fc_kdgaransi) ?>" class="form-control btn-primary">Download</a>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor" value="<?= $garansi_data->fv_nmpelapor ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Kerusakan</label>
                            <input type="date" name="tgl_rusak" class="form-control" placeholder="Tanggal Kerusakan" value="<?= $garansi_data->fd_tgl_kerusakan ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Jabatan Pelapor</label>
                            <input type="text" name="jabatan_pelapor" class="form-control" placeholder="Jabatan Pelapor" value="<?= $garansi_data->fv_jabatan_pelapor?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Luasan Kerusakan</label>
                            <input type="text" name="luasan_rusak" class="form-control" placeholder="Luasan Kerusakan" value="<?= $garansi_data->fv_luasan_kerusakan ?>" readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-3 mt-2">Tanggal Lapor</label>
                            <input type="date" name="tgl_lapor" class="form-control" placeholder="Tanggal Lapor" value="<?= $garansi_data->fd_tgl_lapor ?>" readonly>
                        </div>

                        <?php if($investigasi_garansi == '') {

                        } else { ?>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">PIC Internal KTG</label>
                              <select name="pic_ktg" class="form-control" required readonly>
                                  <option value="<?= $investigasi_garansi->fn_iddepartment ?>"><?= $investigasi_garansi->fv_nmdepartment ?></option>
                              </select>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3">Analisa Akar Masalah</label>
                            <input type="text" name="analisa_masalah" value='<?php echo $investigasi_garansi->f_analisa_masalah; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3">Rencana Penggantian</label>
                            <input type="text" name="rencana_penggantian" class="form-control" placeholder="Rencana Penggantian" value='<?php echo $investigasi_garansi->fv_rencana_penggantian; ?>' required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-3 mt-2">Due Date</label>
                            <input type="date" name="due_date" class="form-control" placeholder="Due Date" value='<?php echo $investigasi_garansi->fd_due_date; ?>' required readonly>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-sm-1 mt-2">Catatan</label>
                            <textarea name="Catatan" class="form-control" placeholder="Catatan" required readonly><?php echo $investigasi_garansi->fv_catatan; ?></textarea>
                        </div>
                        <?php } ?>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
