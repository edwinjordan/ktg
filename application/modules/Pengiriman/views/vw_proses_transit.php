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
            <h1>Proses Transit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List Pengiriman</a></li>
              <li class="breadcrumb-item active">Proses Transit</li>
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
          <h3 class="card-title">Proses Transit</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <?php echo form_open_multipart('Pengiriman/update_proses_transit/'.$po_data->fn_idpo);?>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
          <div class="card" style="width: 50%; margin: auto; border-radius: 15px">
            <div class="card-body">
              <div class="card" style="width: 80%; margin: auto; border-radius: 10px">
                <h3 style="margin: 10px"><?php echo $po_data->fc_kdpo ?></h3>
                <p style="margin: 10px"><?php echo $po_data->fv_alamat_kirim ?></p>
              </div>
              <i class="fas fa-map-marker-alt fa-lg ml-5 mt-4 mb-4" aria-hidden="true"></i> KTG -----><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $po_data->fv_alamat_kirim ?><br/>
              <textarea class="form-control" readonly></textarea>
              <p>Ringkasan Pesanan</p>
              <?php foreach($barang_po as $bp) { ?>
              <div class="col-sm-12 mb-4">
                <label class="col-sm-1"><?php echo $bp->fn_qty ?> X</label><label class="col-sm-9"><?php echo $bp->fv_nmbarang ?></label><label class="col-sm-2"><?php echo $bp->fn_qty_kg ?> Kg</label>
              </div>
              <?php } ?>
              <div class="input-group col-sm-10 mb-4">
                  <label class="col-sm-3 mt-1">Transit</label>
                  <input class="form-control" name="transit" placeholder="Transit Location" required/>
              </div>
              <div class="button-wrap">
                <button type="submit" class="btn btn-primary" style="width: 80%">Transit</button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->