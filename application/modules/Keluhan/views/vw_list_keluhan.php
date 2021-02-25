 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Laporan Keluhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">List Keluhan</li>
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
          <h3 class="card-title">List Laporan Keluhan</h3>

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
                        <th scope="col" style="text-align:center;">Kode Keluhan</th>
                        <th scope="col" style="text-align:center;">Kode Barang</th>
                        <th scope="col" style="text-align:center;">Jumlah Rusak</th>
                        <th scope="col" style="text-align:center;">Tanggal Keluhan</th>
                        <th scope="col" style="text-align:center;">Status</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($keluhan_data as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fc_kdkeluhan; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdbarang; ?></th>
                            <th style="text-align:center;"><?= $items->fn_jml_rusak; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tgl_keluhan; ?></th>

                            <?php $cek_penilaian = $this->db->where('fn_idpo', $items->fn_idpo)
                                                                  ->get('tm_penilaian_keluhan')->num_rows(); ?>

                            <?php if($this->session->userdata('level_user') == '1') { ?>
                              <?php if($items->fc_approval == '0') { ?>
                                  <th style="text-align:center;">Laporan Diproses</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Keluhan/investigasi_keluhan/'.$items->fc_kdkeluhan); ?>" class="btn btn-primary">Investigasi Keluhan</a>
                                  </th>
                              <?php } elseif($items->fc_approval == '1') { ?>
                                  <th style="text-align:center;">Keluhan Di Investigasi</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Keluhan/approval_keluhan/'.$items->fc_kdkeluhan); ?>" class="btn btn-primary">Approve Keluhan</a>
                                  </th>
                              <?php } elseif($items->fc_approval == '2') { ?>
                                  <th style="text-align:center;">Proses Perbaikan</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Keluhan/proses_perbaikan/'.$items->fc_kdkeluhan); ?>" class="btn btn-primary">Proses Perbaikan</a>
                                  </th>
                              <?php } elseif($items->fc_approval == '3') { ?>
                                  <th style="text-align:center;">Perbaikan Selesai</th>
                                  <th style="text-align:center;">
                                      <a href="<?php echo site_url('Keluhan/respon_pelanggan/'.$items->fc_kdkeluhan); ?>" class="btn btn-primary">Respon ke Pelanggan</a>
                                  </th>
                              <?php } elseif($items->fc_approval == '4') { ?>
                                  <th style="text-align:center;">Selesai</th>
                                  
                                  <th style="text-align:center;">
                                  <?php if($cek_penilaian > 0) { ?>
                                      <a href="<?php echo site_url('Penilaian/lihat_penilaian_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Lihat Penilaian</a>
                                      <a href="<?php echo site_url('Keluhan/detail_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                  <?php } else { ?>
                                    <th style="text-align:center;">
                                        Belum Dinilai
                                        <a href="<?php echo site_url('Keluhan/detail_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>    
                                    </th>
                                  <?php } ?>

                              <?php } ?>
                            <?php } elseif($this->session->userdata('level_user') == '2') { ?>
                              <?php if($items->fc_approval == '0') { ?>
                                  <th style="text-align:center;">Laporan Diproses</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fc_approval == '1') { ?>
                                  <th style="text-align:center;">Keluhan Di Investigasi</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fc_approval == '2') { ?>
                                  <th style="text-align:center;">Proses Perbaikan</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fc_approval == '3') { ?>
                                  <th style="text-align:center;">Perbaikan Selesai</th>
                                  <th style="text-align:center;"></th>
                              <?php } elseif($items->fc_approval == '4') { ?>
                                  <th style="text-align:center;">Selesai</th>

                                  <th style="text-align:center;">
                                  <?php if($cek_penilaian > 0) { ?>
                                      <a href="<?php echo site_url('Penilaian/lihat_penilaian_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Lihat Penilaian</a>
                                      <a href="<?php echo site_url('Keluhan/detail_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                  <?php } else { ?>
                                      <a href="<?php echo site_url('Penilaian/penilaian_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo.'/'.$items->fc_kdpo.'/'.$items->fc_kdsj); ?>" class="btn btn-primary">Beri Nilai</a>
                                      <a href="<?php echo site_url('Keluhan/detail_keluhan/'.$items->fc_kdkeluhan.'/'.$items->fn_idpo); ?>" class="btn btn-success">Detail</a>
                                  <?php } ?>
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
