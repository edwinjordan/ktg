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
          <h3 class="card-title">List Barang Terima</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">Kode PO</th>
                        <th scope="col" style="text-align:center;">Kode SJ</th>
                        <th scope="col" style="text-align:center;">Tanggal PO</th>
                        <th scope="col" style="text-align:center;">Target Tanggal Kirim</th>
                        <th scope="col" style="text-align:center;">Status</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($list_barang_terima as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tglpo; ?></th>
                            <th style="text-align:center;"><?= $items->fd_target_tglkirim; ?></th>
                            <?php if($items->fn_status_po == '8') { ?>
                                <th style="text-align:center;">Barang Sampai</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Penilaian/konfirmasi_terima_barang/'.$items->fn_idpo); ?>" class="btn btn-primary">Konfirmasi Barang Diterima</a>
                                </th>
                            <?php } elseif($items->fn_status_po == '9') { ?>
                                <th style="text-align:center;">Barang Diterima</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Penilaian/penilaian_pengiriman/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Beri Penilaian</a>
                                    <a href="<?php echo site_url('Keluhan/pelaporan_keluhan/'.$items->fn_idpo); ?>" class="btn btn-danger">Laporkan Keluhan</a>
                                </th>
                            <?php } ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
