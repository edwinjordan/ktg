 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Investigasi Keluhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List Laporan Keluhan</a></li>
              <li class="breadcrumb-item active">Investigasi Keluhan</li>
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
          <h3 class="card-title">Laporan Keluhan Kode <?= $kdkeluhan ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <?php echo form_open_multipart('Keluhan/insert_investigasi_keluhan/'.$kdkeluhan);?>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="card-body">
                    <div class="row">
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">PIC Internal KTG</label>
                              <select name="pic_ktg" class="form-control" required>
                                <option disabled selected style="display: none">Pilih Department</option>
                                <?php foreach($department as $items) { ?>
                                  <option value="<?= $items->fn_iddepartment ?>"><?= $items->fv_nmdepartment ?></option>
                                <?php } ?>
                              </select>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Analisa Akar Masalah</label>
                            <input type="text" name="analisa_masalah" class="form-control" placeholder="Analisa Akar Masalah" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Rencana Perbaikan</label>
                            <input type="text" name="rencana_perbaikan" class="form-control" placeholder="Rencana Perbaikan" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                            <label class="col-sm-4 mt-2">Due Date</label>
                            <input type="date" name="due_date" class="form-control" placeholder="Due Date" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-sm-2 mt-2">Feedback</label>
                            <textarea name="feedback" class="form-control" placeholder="Rekomendasi Feedback" required></textarea>
                        </div>
                    </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Laporkan Keluhan</a>
        </div>
      <?php echo form_close(); ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->
