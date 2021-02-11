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
          <h3 class="card-title">Pilih Ekspedisi</h3>

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
                        <th scope="col" style="text-align:center;">Nama Ekspedisi</th>
                        <th scope="col" style="text-align:center;">Tanggal Penawaran</th>
                        <th scope="col" style="text-align:center;">Jumlah Penawaran</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pilih_ekspedisi as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fv_nama_ekspedisi; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tgl_penawaran; ?></th>
                            <th style="text-align:center;"><?= $items->fm_harga_ekspedisi; ?></th>
                            <th style="text-align:center;">
                              <a href="<?php echo site_url('PO/approve_penawaran/'.$items->fn_idpo.'/'.$items->fn_idpo_ekspedisi); ?>" class="btn btn-primary">Approve</a>
                            </th>
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
