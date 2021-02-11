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
          <h3 class="card-title">Penawaran Harga Ekspedisi</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <form action="<?php echo site_url('PO/add_penawaran_harga/'.$po_data->fn_idpo) ?>" method="post" enctype="multipart/form">
        <div class="card-body">
                <table class="table">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            No. PO
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?php echo $po_data->fc_kdpo ?>" required disabled>
                            No. SJ
                            <input type="text" name="nosj" class="form-control" placeholder="No. SJ" value="<?php echo $po_data->fc_kdsj ?>" required disabled>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Target Tanggal Kirim
                            <input type="date" name="tgl_kirim" class="form-control" placeholder="Target Tanggal Kirim" value="<?php echo $po_data->fd_target_tglkirim ?>" required disabled>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Tanggal PO
                            <input type="date" name="tgl_po" class="form-control" placeholder="Tgl. PO" value="<?php echo $po_data->fd_tglpo ?>" required disabled>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Alamat Pengiriman
                            <input type="text" name="alamat_kirim" class="form-control" placeholder="Alamat Pengiriman" value="<?php echo $po_data->fv_alamat_kirim ?>" required disabled>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Jenis Angkutan
                            <input type="text" name="jenis_angkutan" class="form-control" placeholder="Jenis Angkutan Yang Dibutuhkan" value="<?php echo $po_data->fv_jns_angkutan ?>" required disabled>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            Jaminan Ekspedisi
                            <input type="text" name="jaminan_ekspedisi" class="form-control" placeholder="Jaminan Ekspedisi" value="<?php echo $po_data->fv_jmn_ekspedisi ?>" required disabled>
                        </div>
                    </div>
                    <thead>
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
                    </tbody>
                </table>
                  <div class="input-group mb-3">
                    Persyaratan Ekspedisi
                    <textarea type="text" name="persyaratan_ekspedisi" class="form-control" placeholder="Persyaratan Ekspedisi Yang Harus Di Penuhi" required disabled><?php echo $po_data->fv_syarat_ekspedisi ?></textarea>
                  </div>
                  <div class="input-group mb-3 col-sm-6 float-sm-right">
                    Harga Penawaran
                    <input type="text" name="harga_penawaran" class="form-control" placeholder="Masukkan Harga" required>
                  </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Simpan</a>
        </div>
      </form>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
