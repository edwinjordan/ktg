 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Barang Bergaransi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List Barang Terima</a></li>
              <li class="breadcrumb-item active">List Barang Bergaransi</li>
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
          <h3 class="card-title">List Garansi</h3>

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
                        <th scope="col" style="text-align:center;">No</th>
                        <th scope="col" style="text-align:center;">Kode PO</th>
                        <th scope="col" style="text-align:center;">Nama Barang</th>
                        <th scope="col" style="text-align:center;">Qty</th>
                        <th scope="col" style="text-align:center;">Qty (Kg)</th>
                        <th scope="col" style="text-align:center;">Dimensi</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_garansi as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $i; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fv_nmbarang; ?></th>
                            <th style="text-align:center;"><?= $items->fn_qty; ?></th>
                            <th style="text-align:center;"><?= $items->fn_qty_kg; ?></th>
                            <th style="text-align:center;"><?= $items->f_dimensi; ?></th>

                            <?php $cek = $this->db->where('fn_idpo', $items->fn_idpo)
                                                  ->get('tm_garansi')->num_rows(); ?>

                            <?php $cek_sts_penilaian = $this->db->select('*') 
                                                            ->where('fn_idpo', $items->fn_idpo)
                                                            ->where('fc_sts=2')
                                                            ->get('tm_garansi')->num_rows() ?>
                            
                            <?php if($cek > 0) { ?>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Garansi/klaim_garansi/'.$items->fn_idpo); ?>" class="btn btn-success">Klaim Garansi</a>

                                    <?php if($cek_sts_penilaian > 0) { ?>
                                      <a href="<?php echo site_url('Penilaian/penilaian_garansi/'.$items->fn_idpo.'/'.$items->fc_kdpo); ?>" class="btn btn-primary">Beri Nilai</a>
                                    <?php } else {} ?>
                                </th>
                            <?php } else{ ?>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Garansi/submit_garansi/'.$items->fn_id_barang.'/'.$items->fn_idpo); ?>" class="btn btn-primary">Submit Garansi</a>
                                </th>
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
