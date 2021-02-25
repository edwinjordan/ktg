 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Pengiriman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Pengiriman') ?>">List Pengiriman</a></li>
              <li class="breadcrumb-item active">List Pengiriman</li>
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
          <h3 class="card-title">List Pengiriman Barang</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <table id="table1" class="display table">
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
                    <?php foreach ($list_pengiriman_po as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tglpo; ?></th>
                            <th style="text-align:center;"><?= $items->fd_target_tglkirim; ?></th>

                            <?php $cek_penilaian = $this->db->where('fn_idpo', $items->fn_idpo)
                                                              ->get('tm_penilaian_pengiriman')->num_rows(); ?>

                            <?php if($this->session->userdata('level_user') == '1') { ?>

                              <?php if($items->fn_status_po == '5') { ?>
                                  <th style="text-align:center;">Proses Loading</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-primary">Proses Pengiriman</a>
                                  </th>
                              <?php } elseif($items->fn_status_po == '6') { ?>
                                  <th style="text-align:center;">Proses Pengiriman</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_hold/'.$items->fn_idpo); ?>" class="btn btn-danger">Hold</a>
                                  </th>
                              <?php } elseif($items->fn_status_po == '7') { ?>
                                  <th style="text-align:center;">Barang Sampai di Kota Tujuan</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fn_status_po == '8') { ?>
                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>
                                  <th style="text-align:center;"><a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a></th>
                              <?php } elseif($items->fn_status_po == '9') { ?>
                                  
                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>

                                  <?php if($cek_penilaian > 0) { ?>
                                    <th style="text-align:center;">
                                      <a href="<?php echo site_url('Penilaian/lihat_penilaian_pengiriman/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Lihat Penilaian</a>
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                    </th>
                                  <?php } else { ?>
                                    <th style="text-align:center;">
                                      <a>Belum Dinilai</a>
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                    </th>
                                  <?php } ?>

                              <?php } elseif($items->fn_status_po == '10') { ?>
                                  <th style="text-align:center;">Pengiriman di Hold</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_unhold/'.$items->fn_idpo); ?>" class="btn btn-success">Unhold</a>
                                  </th>
                              <?php } ?>

                            <?php } elseif($this->session->userdata('level_user') == '2') { ?>

                              <?php if($items->fn_status_po == '5') { ?>
                                  <th style="text-align:center;">Proses Loading</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fn_status_po == '6') { ?>
                                  <th style="text-align:center;">Proses Pengiriman</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fn_status_po == '7') { ?>
                                  <th style="text-align:center;">Barang Sampai di Kota Tujuan</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fn_status_po == '8') { ?>
                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>
                                  <th style="text-align:center;">
                                    <a href="<?php echo site_url('Penilaian/konfirmasi_terima_barang/'.$items->fn_idpo); ?>" class="btn btn-primary">Konfirmasi Barang Diterima</a>
                                    <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                  </th>
                              <?php } elseif($items->fn_status_po == '9') { ?>

                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>

                                  <?php if($cek_penilaian > 0) { ?>
                                    <th style="text-align:center;">
                                      <a href="<?php echo site_url('Penilaian/lihat_penilaian_pengiriman/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Lihat Penilaian</a>
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                    </th>
                                  <?php } else { ?>
                                    <th style="text-align:center;">
                                      Belum Dinilai
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>  
                                    </th>
                                  <?php } ?>

                              <?php } elseif($items->fn_status_po == '10') { ?>
                                  <th style="text-align:center;">Pengiriman di Hold</th>
                                  <th style="text-align:center;"></th>
                              <?php } ?>

                            <?php } else { ?>

                              <?php if($items->fn_status_po == '5') { ?>
                                  <th style="text-align:center;">Proses Loading</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fn_status_po == '6') { ?>
                                  <th style="text-align:center;">Proses Pengiriman</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_hold/'.$items->fn_idpo); ?>" class="btn btn-danger">Hold</a>
                                      <a href="<?php echo site_url('Pengiriman/proses_transit/'.$items->fn_idpo); ?>" class="btn btn-warning">Transit</a>
                                      <a href="<?php echo site_url('Pengiriman/proses_unloading/'.$items->fn_idpo); ?>" class="btn btn-primary">Unloading</a>
                                  </th>
                              <?php } elseif($items->fn_status_po == '7') { ?>
                                  <th style="text-align:center;">Barang Sampai di Kota Tujuan</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_barang_diterima/'.$items->fn_idpo); ?>" class="btn btn-primary">Barang Diterima</a>
                                  </th>
                              <?php } elseif($items->fn_status_po == '8') { ?>
                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>
                                  <th style="text-align:center;"><a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a></th>
                              <?php } elseif($items->fn_status_po == '9') { ?>

                                  <th style="text-align:center;">Barang Telah Diterima Customer</th>

                                  <?php if($cek_penilaian > 0) { ?>
                                    <th style="text-align:center;">
                                      <a href="<?php echo site_url('Penilaian/lihat_penilaian_pengiriman/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Lihat Penilaian</a>
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                    </th>
                                  <?php } else { ?>
                                    <th style="text-align:center;">
                                      Belum Dinilai
                                      <a href="<?php echo site_url('Pengiriman/Detail_pengiriman/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>  
                                    </th>
                                  <?php } ?>

                              <?php } elseif($items->fn_status_po == '10') { ?>
                                  <th style="text-align:center;">Pengiriman di Hold</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Pengiriman/proses_unhold/'.$items->fn_idpo); ?>" class="btn btn-success">Unhold</a>
                                  </th>
                              <?php } ?>
                            <?php } ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

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
