 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Barang Terima</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Penilaian') ?>">List Barang Terima</a></li>
              <li class="breadcrumb-item active">List Barang Terima</li>
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
            <table id="table1" class="display">
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

                            <?php $cek_penilaian = $this->db->where('fn_idpo', $items->fn_idpo)
                                                            ->where('fn_id_customer', $this->session->userdata('id_customer'))
                                                            ->get('tm_penilaian_pengiriman')->num_rows(); ?>

                            <?php $cek_batas_keluhan = $this->db->where('fn_idpo', $items->fn_idpo)
                                                            ->where('fn_id_customer', $this->session->userdata('id_customer'))
                                                            ->where('fd_target_tglsampai BETWEEN CURDATE()-5 AND CURDATE()')
                                                            ->get('tm_po')->num_rows(); ?>

                                <th style="text-align:center;">Barang Diterima</th>
                                <th style="text-align:center;">
                                <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>  
                                  <?php if($cek_penilaian > 0) { ?>

                                  <?php } else { ?>
                                    <a href="<?php echo site_url('Penilaian/penilaian_pengiriman/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Beri Penilaian</a>
                                  <?php } ?>

                                  <?php if($cek_batas_keluhan > 0) { ?>
                                    <a href="<?php echo site_url('Keluhan/pelaporan_keluhan/'.$items->fn_idpo); ?>" class="btn btn-danger">Laporkan Keluhan</a>
                                  <?php } else { ?>

                                  <?php } ?>
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

<script>
$(document).ready(function() {
    $('#table1').DataTable();
} );
</script>
