 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
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
          <h3 class="card-title">Detail PO</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Keluhan/submit_keluhan/'.$po_data->fc_kdpo.'/'.$po_data->fc_kdsj);?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
                <table class="table">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            No. PO
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?php echo $po_data->fc_kdpo ?>" required readonly>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Foto Barang Cacat
                            <input type="file" name="foto_barang" class="form-control" placeholder="Foto Barang Cacat" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Tanggal Keluhan
                            <input type="date" name="tgl_keluhan" class="form-control" placeholder="Tanggal Keluhan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Foto No. SPK Barang
                            <input type="file" name="foto_spk" class="form-control" placeholder="Foto No. SPK Barang" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Nama Barang
                              <select name="kode_barang" class="form-control" required>
                                <option disabled selected style="display: none">Pilih Barang</option>
                                <?php foreach($barang_po as $items) { ?>
                                  <option value="<?= $items->fc_kdbarang ?>"><?= $items->fv_nmbarang ?></option>
                                <?php } ?>
                              </select>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Indikasi Penyebab
                            <input type="text" name="indikasi_penyebab" class="form-control" placeholder="Indikasi Penyebab" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Jumlah Rusak
                            <input type="text" name="jml_rusak" class="form-control" placeholder="Jumlah Yang Rusak" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Nama Pelapor
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Jenis Keluhan
                            <input type="text" name="jns_keluhan" class="form-control" placeholder="Jenis Keluhan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Jabatan Pelapor
                            <input type="text" name="jabatan_pelapor" class="form-control" placeholder="Jabatan Pelapor" required>
                        </div>
                    </div>
                    <!-- <thead>
                        <tr>
                            <th scope="col" style="text-align:center;">No</th>
                            <th scope="col" style="text-align:center;">Nama Barang</th>
                            <th scope="col" style="text-align:center;">Qty</th>
                            <th scope="col" style="text-align:center;">Qty (Kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang_po as $items) : ?>
                            <tr>
                                <th style="text-align:center;"><?php echo $i; ?></th>
                                <th style="text-align:center;"><?= $items->fv_nmbarang; ?></th>
                                <th style="text-align:center;"><?php echo $items->fn_qty ?></th>
                                <th style="text-align:center;"><?php echo number_format($items->fn_qty_kg); ?></th>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody> -->
                </table>
            
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
