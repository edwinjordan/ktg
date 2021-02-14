<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Level</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Form Level</li>
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
                    <h3 class="card-title">Form Level</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>
                <?php echo form_open_multipart('Level/save');?>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <label for="email" class="form-label">Nama Level</label>
                        <input type="text" class="form-control" name="namaLevel" id="namaLevel">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                <?php echo form_close(); ?>
    
                </div>
            </div>
        </div>
    </div>
</section>            
