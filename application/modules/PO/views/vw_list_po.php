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
          <h3 class="card-title">List PO</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <a href="<?php echo site_url('PO'); ?>" class="btn btn-primary m-2">Tambah PO</a>
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
                    <?php foreach ($list_po as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tglpo; ?></th>
                            <th style="text-align:center;"><?= $items->fd_target_tglkirim; ?></th>
                            <?php if($items->fn_status_po == '0') { ?>
                                <th style="text-align:center;">PO Konfirm</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/proses_produksi/'.$items->fn_idpo); ?>" class="btn btn-primary">Produksi</a>
                                </th>
                            <?php } elseif($items->fn_status_po == '1') { ?>
                                <th style="text-align:center;">Mulai Produksi</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/offer/'.$items->fn_idpo); ?>" class="btn btn-primary">Offer Ekspedisi</a>
                                </th>
                            <?php } elseif($items->fn_status_po == '2') { ?>

                            <?php $cek_ekspedisi = $this->db->where('fn_idpo', $items->fn_idpo)
                                                            ->get('td_po_ekspedisi')->num_rows(); ?>

                                <th style="text-align:center;">Offer Ke Ekspedisi</th>
                                
                                <?php if($cek_ekspedisi > 0) { ?>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/pilih_ekspedisi/'.$items->fn_idpo); ?>" class="btn btn-primary">Pilih Ekspedisi</a>
                                </th>
                                <?php } else {

                                } ?>
                                
                            <?php } elseif($items->fn_status_po == '3') { ?>
                                <th style="text-align:center;">Menunggu Konfirmasi Ekspedisi</th>
                            <?php } elseif($items->fn_status_po == '4') { ?>
                                <th style="text-align:center;">Konfirmasi Diterima</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/proses_loading/'.$items->fn_idpo); ?>" class="btn btn-primary">Proses Loading</a>
                                </th>
                            <?php } elseif($items->fn_status_po == '5') { ?>
                                <th style="text-align:center;">Proses Loading</th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Pengiriman/proses_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-primary">Proses Pengiriman</a>
                                </th>
                            <?php } elseif($items->fn_status_po == '6') { ?>
                                <th style="text-align:center;">Proses Pengiriman</th>
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
