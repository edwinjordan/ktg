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
          <h3 class="card-title">List Pengajuan Garansi</h3>

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
                        <th scope="col" style="text-align:center;">Kode Garansi</th>
                        <th scope="col" style="text-align:center;">Foto Kerusakan</th>
                        <th scope="col" style="text-align:center;">Tanggal Kerusakan</th>
                        <th scope="col" style="text-align:center;">Luasan Kerusakan</th>
                        <th scope="col" style="text-align:center;">Indikasi Kerusakan</th>
                        <th scope="col" style="text-align:center;">Nama</th>
                        <th scope="col" style="text-align:center;">Jabatan</th>
                        <th scope="col" style="text-align:center;">Tanggal Lapor</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengajuan_garansi as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $i; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdgaransi; ?></th>
                            <th style="text-align:center;"><?= $items->f_foto_kerusakan; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tgl_kerusakan; ?></th>
                            <th style="text-align:center;"><?= $items->fv_luasan_kerusakan; ?></th>
                            <th style="text-align:center;"><?= $items->fv_indikasi_kerusakan; ?></th>
                            <th style="text-align:center;"><?= $items->fv_nmpelapor; ?></th>
                            <th style="text-align:center;"><?= $items->fv_jabatan_pelapor; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tgl_lapor; ?></th>

                            <?php if($items->fc_sts == '0') { ?>
                              <th style="text-align:center;">
                                <a href="<?php echo site_url('Garansi/investigasi_garansi/'.$items->fc_kdgaransi); ?>" class="btn btn-success">Investigasi</a>
                              </th>
                            <?php } elseif($items->fc_sts == '1') { ?>
                              <th style="text-align:center;">
                                <a href="<?php echo site_url('Garansi/approval_garansi/'.$items->fc_kdgaransi); ?>" class="btn btn-success">Approval</a>
                              </th>
                            <?php } elseif($items->fc_sts == '2') { ?>
                              <th style="text-align:center;">
                                <a href="<?php echo site_url('PO'); ?>" class="btn btn-success">Proses Ganti</a>
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
