<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('PO/list_po') ?>">List PO</a></li>
              <li class="breadcrumb-item active">PO</li>
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
          <h3 class="card-title">PO</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <table class="table">
                <?php echo form_open_multipart('PO/barang_cart');?>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                          <label class="col-sm-4 mt-2">No. PO & No. SJ</label>
                            <input type="text" name="nopo" class="form-control" placeholder="No. PO" value="<?php echo $this->session->userdata('nopo'); ?>" required>
                            <input type="text" name="nosj" class="form-control" placeholder="No. SJ" value="<?php echo $this->session->userdata('nosj'); ?>">
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Target Tanggal Kirim</label>
                            <input type="date" name="tgl_kirim" class="form-control" placeholder="Target Tanggal Kirim" value="<?php echo $this->session->userdata('tgl_kirim'); ?>" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Tanggal PO</label>
                            <input type="date" name="tgl_po" class="form-control" placeholder="Tgl. PO" value="<?php echo $this->session->userdata('tgl_po'); ?>" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Alamat Pengiriman</label>
                            <input type="text" name="alamat_kirim" class="form-control" placeholder="Alamat Pengiriman" value="<?php echo $this->session->userdata('alamat_kirim'); ?>" required>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center;">No</th>
                            <th scope="col" style="text-align:center;">Nama Barang</th>
                            <th scope="col" style="text-align:center;">Qty</th>
                            <th scope="col" style="text-align:center;">Satuan</th>
                            <th scope="col" style="text-align:center;">Qty (Kg)</th>
                            <th scope="col" style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cari Barang -->
                        
                        <tr>
                            <th></th>
                            <th>
                              <input type="text" id="search" name="nama_barang" class="form-control" placeholder="Nama Barang">
                              <input type="hidden" name="id_barang" class="form-control" placeholder="Id Barang">  
                            </th>
                            <th style="width: 10%"><input type="text" name="qty" class="form-control" placeholder="Qty"></th>
                            <th style="width: 10%"><input type="text" name="satuan" class="form-control" placeholder="Satuan"></th>
                            <th style="width: 10%"><input type="text" name="qty_kg" class="form-control" placeholder="Qty (Kg)"></th>
                            <th style="text-align: center; width: 10%"><button type="submit" class="btn btn-primary">[+] Tambah</button></th>
                        </tr>
                <?php echo form_close(); ?>

                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                            <tr>
                                <!-- <td><?= $items['id']; ?></td> -->
                                <th style="text-align:center;"><?php echo $i; ?></th>
                                <th style="text-align:center;"><?= $items['name']; ?></th>
                                <th style="text-align:center;"><?php echo $items['qty_etc']; ?></th>
                                <th style="text-align:center;"><?php echo $items['satuan']; ?></th>
                                <th style="text-align:center;"><?php echo number_format($items['qty']); ?></th>
                                <th style="text-align:center;"><a href="<?php echo site_url('PO/barang_cart_delete/' . $items['rowid']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-close"></span>[-] Hapus</a></th>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?php echo site_url('PO/simpan_po'); ?>" class="btn btn-success float-sm-right">Simpan PO</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
 
 $('#search').autocomplete({
     source: "<?php echo site_url('PO/search_autocomplete');?>",

     select: function (event, ui) {
         $('[name="nama_barang"]').val(ui.item.label); 
         $('[name="id_barang"]').val(ui.item.description); 
     }
 });

});
</script>
