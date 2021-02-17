<style>
input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 10px;
        left: 8px;
        font-size: 17px;
        color: #b8b8b8;
      }
      .button-wrap {
        position: relative;
        text-align: center;
        margin-top: 10px;
      }
      .button {
        display: inline-block;
        padding: 12px 18px;
        cursor: pointer;
        border-radius: 5px;
        background-color: #8ebf42;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        width: 80%;
      }
</style>
<!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proses Loading (Muat)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('PO/list_po') ?>">List PO</a></li>
              <li class="breadcrumb-item active">Proses Loading</li>
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
          <h3 class="card-title">Proses Loading (Muat)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Pengiriman/loading_po/'.$po_data->fn_idpo);?>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
          <div class="card" style="width: 50%; margin: auto; border-radius: 15px">
            <div class="card-body">
              <div class="card" style="width: 80%; margin: auto; border-radius: 10px">
                <h3 style="margin: 10px">Kode Barang : <?php echo $po_data->fc_kdpo ?></h3>
                <p style="margin: 10px">Alamat Kirim : <?php echo $po_data->fv_alamat_kirim ?></p>
              </div>
              <div class="button-wrap">
                <label class="button" for="upload">Upload File</label>
                <input id="upload" type="file" name="img-loading" required>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
        <?php echo form_close(); ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->