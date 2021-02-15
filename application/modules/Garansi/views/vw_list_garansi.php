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
          <h3 class="card-title">List Garansi</h3>

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

                            <?php $cek = $this->db->where('fc_kdpo', $items->fc_kdpo)
                                                  ->get('tm_garansi')->num_rows(); ?>
                            
                            <?php if($cek > 0) { ?>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Garansi/klaim_garansi/'.$items->fc_kdpo); ?>" class="btn btn-success">Klaim Garansi</a>
                                </th>
                            <?php } else{ ?>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('Garansi/submit_garansi/'.$items->fn_id_barang.'/'.$items->fc_kdpo); ?>" class="btn btn-primary">Submit Garansi</a>
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
