 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Bobot Perbulan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Rekap Bobot</li>
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
          <h3 class="card-title">Rekapitulasi Bobot KTG Bulan <?php echo date('F', STRTOTIME($monthYear)); ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <?php echo form_open_multipart('Rekapitulasi/pilih_bulan');?>
            <input name="monthYear" id="month" type="month" value="<?php echo $monthYear ?>">
            <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 5px;">Submit</button>
          <?php echo form_close(); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">Kelompok</th>
                        <th scope="col" style="text-align:center;">ID PO</th>
                        <th scope="col" style="text-align:center;">Kode PO</th>
                        <th scope="col" style="text-align:center;">Kode SJ</th>
                        <th scope="col" style="text-align:center;">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $grandTotalPengiriman = 0;
                     foreach ($rekap_pengiriman as $items) : ?>
                        <tr>
                            <th colspan="5">Bobot Nilai Pengiriman</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th style="text-align:center;"><?= $items->fn_idpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->totalBobotPengiriman; ?></th>
                        </tr>

                        <?php
                          $grandTotalPengiriman = $grandTotalPengiriman + $items->totalBobotPengiriman;
                        ?>

                    <?php endforeach; ?>
                    <?php $grandTotalKeluhan = 0; 
                      foreach ($rekap_keluhan as $items) : ?>
                        <tr>
                            <th colspan="5">Bobot Nilai Keluhan</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th style="text-align:center;"><?= $items->fn_idpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->totalBobotKeluhan; ?></th>
                        </tr>

                        <?php
                          $grandTotalKeluhan = $grandTotalKeluhan + $items->totalBobotKeluhan;
                        ?>

                    <?php endforeach; ?>
                    <?php $grandTotalGaransi = 0; 
                      foreach ($rekap_garansi as $items) : ?>
                        <tr>
                            <th colspan="5">Bobot Nilai Garansi</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th style="text-align:center;"><?= $items->fn_idpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->totalBobotGaransi; ?></th>
                        </tr>

                        <?php
                          $grandTotalGaransi = $grandTotalGaransi + $items->totalBobotGaransi;
                        ?>

                    <?php endforeach; ?>

                        <?php $grandTotalBobot = $grandTotalPengiriman + $grandTotalKeluhan + $grandTotalGaransi; ?>

                        <tr>
                          <th colspan="3"></th>
                          <th style="text-align:center; border-top: 1px solid">Total Bobot</th>
                          <th style="text-align:center; border-top: 1px solid"><?php echo $grandTotalBobot; ?></th>
                        </tr>
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
//DATEPICKER BULAN DAN TAHUN
const monthControl = document.querySelector('input[type="month"]');
const date= new Date()
const month=("0" + (date.getMonth() + 1)).slice(-2)
const year=date.getFullYear()
// monthControl.value = `${year}-${month}`;
</script>
