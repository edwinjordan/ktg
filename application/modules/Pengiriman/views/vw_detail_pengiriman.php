 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengiriman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Pengiriman') ?>">List Pengiriman</a></li>
              <li class="breadcrumb-item active">Detail Pengiriman</li>
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
          <h3 class="card-title">Detail Pengiriman</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
                <table class="table">
                    <div class="row">
                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">No. PO</label>
                            <p class="col-sm-6">: <?php echo $po_data->fc_kdpo ?></p>
                        </div>
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Target Tanggal Kirim</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_target_tglkirim)) ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal PO</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_tglpo)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">No. SJ</label>
                            <p class="col-sm-6"> :<?php echo $po_data->fc_kdsj ?></p>
                        </div>
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Alamat Pengiriman</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_alamat_kirim ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal SJ</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_tglsj)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">Jenis Angkutan</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_jns_angkutan ?></p>
                        </div> 
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Jaminan Ekspedisi</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_jmn_ekspedisi ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal Muat</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_tglmuat)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">Nama Ekspedisi</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_nama_ekspedisi ?></p>
                        </div> 
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Harga Penawaran</label>
                            <p class="col-sm-6">: Rp. <?php echo $po_data->fm_harga_ekspedisi ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal Sampai</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_target_tglsampai)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">Nama Penerima</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_nm_penerima ?></p>
                        </div> 
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Jabatan Penerima</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_jabatan_penerima ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal Terima</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_tgl_konfirmasi_terima_barang)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">Nama Penilai</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_nm_penilai ?></p>
                        </div> 
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Jabatan Penilai</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_jabatan_penilai ?></p>
                        </div>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-6">Tanggal Penilaian</label>
                            <p class="col-sm-6">: <?php echo date('d-m-Y', strtotime($po_data->fd_tgl_penilaian)) ?></p>
                        </div>

                        <div class="input-group col-sm-3">
                            <label class="col-sm-6">Transit Di</label>
                            <p class="col-sm-6">: <?php echo $po_data->fv_transit ?></p>
                        </div> 
                        <div class="input-group col-sm-5">
                            <label class="col-sm-6">Download Gambar Load</label>
                            <a href="<?= base_url('Pengiriman/download_img_load/'.$po_data->fn_idpo) ?>" class="col-sm-6 btn btn-primary">Download</a>
                        </div>

                    </div>
                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center;">No</th>
                            <th scope="col" style="text-align:center;">ID Barang</th>
                            <th scope="col" style="text-align:center;">Nama Barang</th>
                            <th scope="col" style="text-align:center;">Qty</th>
                            <th scope="col" style="text-align:center;">Satuan</th>
                            <th scope="col" style="text-align:center;">Qty (Kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang_po as $items) : ?>
                            <tr>
                                <th style="text-align:center;"><?php echo $i; ?></th>
                                <th style="text-align:center;"><?php echo $items->fn_id_barang; ?></th>
                                <th style="text-align:center;"><?php echo $items->fv_nmbarang; ?></th>
                                <th style="text-align:center;"><?php echo $items->fn_qty ?></th>
                                <th style="text-align:center;"><?php echo $items->fv_satuan ?></th>
                                <th style="text-align:center;"><?php echo number_format($items->fn_qty_kg); ?></th>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                  <div class="input-group mb-3 mt-3">
                    <label class="col-sm-2 mt-3">Persyaratan Ekspedisi</label>
                    <textarea type="text" name="persyaratan_ekspedisi" class="form-control" placeholder="Persyaratan Ekspedisi Yang Harus Di Penuhi" required disabled><?php echo $po_data->fv_syarat_ekspedisi ?></textarea>
                  </div>
            
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
