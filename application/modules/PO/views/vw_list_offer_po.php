 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Offer PO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('PO/list_offer_po') ?>">List Offer PO</a></li>
              <li class="breadcrumb-item active">List Offer PO</li>
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
          <h3 class="card-title">List Offer PO</h3>

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
                        <th scope="col" style="text-align:center;">No. PO</th>
                        <th scope="col" style="text-align:center;">No. SJ</th>
                        <th scope="col" style="text-align:center;">Tanggal PO</th>
                        <th scope="col" style="text-align:center;">Target Tanggal Kirim</th>
                        <th scope="col" style="text-align:center;">Alamat Kirim</th>
                        <th scope="col" style="text-align:center;">Jenis Angkutan</th>
                        <th scope="col" style="text-align:center;">Jaminan</th>
                        <th scope="col" style="text-align:center;">Status</th>
                        <th scope="col" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($list_offer_po as $items) : ?>
                        <tr>
                            <th style="text-align:center;"><?= $items->fc_kdpo; ?></th>
                            <th style="text-align:center;"><?= $items->fc_kdsj; ?></th>
                            <th style="text-align:center;"><?= $items->fd_tglpo; ?></th>
                            <th style="text-align:center;"><?= $items->fd_target_tglkirim; ?></th>
                            <th style="text-align:center;"><?= $items->fv_alamat_kirim; ?></th>
                            <th style="text-align:center;"><?= $items->fv_jns_angkutan; ?></th>
                            <th style="text-align:center;"><?= $items->fv_jmn_ekspedisi; ?></th>
                            <?php if($items->fn_status_po == '2') { ?>

                            <?php $cek_offer = $this->db->where('fn_idpo', $items->fn_idpo)
                                                        ->where('fn_idekspedisi', $this->session->userdata('id_ekspedisi'))
                                                        ->get('td_po_ekspedisi')->num_rows(); ?>

                              <?php if($cek_offer > 0) { ?>
                                <th style="text-align:center;">
                                  Menunggu Penentuan dari KTG
                                </th>
                                <th style="text-align:center;"></th>
                              <?php } else { ?>
                                <th style="text-align:center;">
                                  Offer Tersedia
                                </th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/penawaran_harga/'.$items->fn_idpo); ?>" class="btn btn-primary">Detail</a>
                                </th>
                              <?php } ?>
                              
                            <?php } elseif($items->fn_status_po == '3') { ?>
                                <th style="text-align:center;">
                                  Menunggu Konfirmasi
                                </th>
                                <th style="text-align:center;">
                                    <a href="<?php echo site_url('PO/konfirmasi_po/'.$items->fn_idpo); ?>" class="btn btn-primary">Konfirmasi</a>
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
