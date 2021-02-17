 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Laporan Keluhan</h1>
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
          <h3 class="card-title">Detail Laporan Keluhan Kode <?= $keluhan_data->fc_kdkeluhan ?></h3>

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
                            <label class="col-sm-4 mt-2">Kode Keluhan</label>
                            <input type="text" value='<?php echo $keluhan_data->fc_kdkeluhan; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Kode PO</label>
                            <input type="text" value='<?php echo $keluhan_data->fc_kdpo; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Nama Barang</label>
                            <input type="text" value='<?php echo $keluhan_data->fv_nmbarang; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Jumlah Rusak</label>
                            <input type="text" value='<?php echo $keluhan_data->fn_jml_rusak; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Jenis Keluhan</label>
                            <input type="text" value='<?php echo $keluhan_data->fv_jenis_keluhan; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Tanggal Keluhan</label>
                            <input type="date" value='<?php echo $keluhan_data->fd_tgl_keluhan; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Indikasi Penyebab</label>
                            <input type="date" value='<?php echo $keluhan_data->fv_indikasi_penyebab; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Nama Pelapor</label>
                            <input type="date" value='<?php echo $keluhan_data->fv_nmpelapor; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Foto Rusak</label>
                            <a href="<?= base_url('Keluhan/download_img_rusak/'.$keluhan_data->fc_kdkeluhan) ?>" class="col-sm-6 btn btn-primary">Download Foto Rusak</a>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Foto SPK</label>
                            <a href="<?= base_url('Keluhan/download_img_spk/'.$keluhan_data->fc_kdkeluhan) ?>" class="col-sm-6 btn btn-primary">Download Foto SPK</a>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">PIC Internal KTG</label>
                              <select name="pic_ktg" class="form-control" required readonly>
                                  <option value="<?= $investigasi_keluhan->fn_iddepartment ?>"><?= $investigasi_keluhan->fv_nmdepartment ?></option>
                              </select>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Analisa Akar Masalah</label>
                            <input type="text" name="analisa_masalah" value='<?php echo $investigasi_keluhan->fv_analisa_akar_masalah; ?>' class="form-control" placeholder="Analisa Akar Masalah" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Rencana Perbaikan</label>
                            <input type="text" name="rencana_perbaikan" class="form-control" placeholder="Rencana Perbaikan" value='<?php echo $investigasi_keluhan->fv_rencana_perbaikan; ?>' required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Due Date</label>
                            <input type="date" name="due_date" class="form-control" placeholder="Due Date" value='<?php echo $investigasi_keluhan->fd_due_date; ?>' required readonly>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-sm-2 mt-2">Feedback</label>
                            <textarea name="feedback" class="form-control" placeholder="Rekomendasi Feedback" required readonly><?php echo $investigasi_keluhan->fv_feedback; ?></textarea>
                        </div>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
