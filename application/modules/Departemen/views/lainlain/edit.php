<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Departemen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Form Departemen</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Departemen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>
                <?php foreach ($departemen as $c) : ?>
                    <?php echo form_open_multipart(base_url() . 'Departemen/update/' . $c['fn_iddepartment']); ?>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <label for="email" class="form-label">Nama Departemen</label>
                        <input type="text" class="form-control" name="namaDepartement" id="namaDepartement" value="<?php echo $c['fv_nmdepartment']; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>  
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>            
