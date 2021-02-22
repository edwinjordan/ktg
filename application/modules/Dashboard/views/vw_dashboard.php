<style>
  .rating {
    margin: auto;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    /* top:-9999px; */
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:300%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <h3 class="card-title">Dashboard</h3>

          <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div> -->
        </div>
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-sm-3">
              <div class="card-body" style="background: #2f74b5; color: white; text-align: center; border-radius: 5px">
                <legend style="font-size: 60px"><?= $total_outstanding_po->TotalOutstandingPO ?></legend>
                <legend>Outstanding PO</legend>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card-body" style="background: #bf8f00; color: white; text-align: center; border-radius: 5px">
                <legend style="font-size: 60px"><?= $total_po_progress->TotalPOProgress ?></legend>
                <legend>PO on Progress</legend>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card-body" style="background: #00af50; color: white; text-align: center; border-radius: 5px">
                <legend style="font-size: 60px"><?= $total_po_delivery->TotalPODelivery ?></legend>
                <legend>PO on Delivery</legend>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card-body" style="background: #f60606; color: white; text-align: center; border-radius: 5px">
                <legend style="font-size: 60px"><?= $total_keluhan->TotalKeluhan ?></legend>
                <legend>Keluhan</legend>
              </div>
            </div>
          </div>

          <table id="table1" class="display table">
            <thead>
              <tr>
                <th style="text-align:center;">No</th>
                <th style="text-align:center;">No. PO</th>
                <th style="text-align:center;">No. SJ</th>
                <th style="text-align:center;">Tgl. Kirim</th>
                <th style="text-align:center;">Customer</th>
                <th style="text-align:center;">Barang</th>
                <th style="text-align:center;">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1; 
                foreach($data_po_dashboard as $dpd) {
              ?>
                <tr>
                  <th style="text-align:center;"><?= $i++ ?></th>
                  <th style="text-align:center;"><?= $dpd->fc_kdpo ?></th>
                  <th style="text-align:center;"><?= $dpd->fc_kdsj ?></th>
                  <th style="text-align:center;"><?= $dpd->fd_target_tglkirim ?></th>
                  <th style="text-align:center;"><?= $dpd->fv_nmcustomer ?></th>
                  <th style="text-align:center;"><?= $dpd->fv_nmbarang ?> . . . </th>

                  <?php if($dpd->fn_status_po == '0') { ?>
                    <th style="text-align:center;">Outstanding</th>
                  <?php } elseif($dpd->fn_status_po == '1') { ?>
                    <th style="text-align:center;">Proses</th>
                  <?php } elseif($dpd->fn_status_po == '5' || $dpd->fn_status_po == '6' || $dpd->fn_status_po == '7' ) { ?>
                    <th style="text-align:center;">Delivery</th>
                  <?php } ?>
                </tr>

              <?php
                }
                $i++
              ?>  
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