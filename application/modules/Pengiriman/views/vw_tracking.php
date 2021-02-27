 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tracking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Pengiriman') ?>">List Pengiriman</a></li>
              <li class="breadcrumb-item active">Tracking</li>
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
          <h3 class="card-title">Tracking Order PO</h3>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">Tanggal</th>
                        <th scope="col" style="text-align:center;">Status</th>
                        <th scope="col" style="text-align:center;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tracking as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= date('d/m/Y', strtotime($items->fd_tgl_tracking)); ?></th>
                            <th style="text-align:center;"><?= $items->fv_status; ?></th>
                            <th style="text-align:center;"><?= $items->fv_keterangan; ?></th>
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
