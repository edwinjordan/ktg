 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pelaporan Keluhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Penilaian') ?>">List Barang Terima</a></li>
              <li class="breadcrumb-item active">Pelaporan Keluhan</li>
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
          <h3 class="card-title">Pelaporan Keluhan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Keluhan/submit_keluhan/'.$po_data->fn_idpo.'/'.$po_data->fc_kdpo.'/'.$po_data->fc_kdsj);?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">No. PO</label>
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?php echo $po_data->fc_kdpo ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Foto Barang Cacat</label>
                            <input type="file" name="foto_barang" class="form-control" placeholder="Foto Barang Cacat" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Tanggal Keluhan</label>
                            <input type="date" name="tgl_keluhan" class="form-control" placeholder="Tanggal Keluhan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Foto No. SPK Barang</label>
                            <input type="file" name="foto_spk" class="form-control" placeholder="Foto No. SPK Barang" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Nama Barang</label>
                              <select name="kode_barang" class="form-control" required>
                                <option disabled selected style="display: none">Pilih Barang</option>
                                <?php foreach($barang_po as $items) { ?>
                                  <option value="<?= $items->fn_id_barang ?>"><?= $items->fv_nmbarang ?></option>
                                <?php } ?>
                              </select>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Indikasi Penyebab</label>
                            <input type="text" name="indikasi_penyebab" class="form-control" placeholder="Indikasi Penyebab" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Jumlah Rusak</label>
                            <input type="text" name="jml_rusak" class="form-control" placeholder="Jumlah Yang Rusak" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Nama Pelapor</label>
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Jenis Keluhan</label>
                            <input type="text" name="jns_keluhan" class="form-control" placeholder="Jenis Keluhan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">Jabatan Pelapor</label>
                            <input type="text" name="jabatan_pelapor" class="form-control" placeholder="Jabatan Pelapor" required>
                        </div>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Laporkan Keluhan</a>
        </div>
      <?php echo form_close(); ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
