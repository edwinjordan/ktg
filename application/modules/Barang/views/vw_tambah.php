<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Form Barang</li>
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
                    <h3 class="card-title">Form Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>
                <form action="<?php echo base_url() . 'Barang/save'; ?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <label for="kode-barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kode-barang" id="kode-barang">
                    </div>
                    <div class="mb-3">
                        <label for="nama-barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama-barang" id="nama-barang">
                    </div>
                    <div class="mb-3">
                        <label for="garansi" class="form-label">Garansi</label>
                        <input type="text" class="form-control" name="garansi" id="garansi">
                    </div>
                    <div class="mb-3">
                        <label for="detail-garansi" class="form-label">Detail Garansi</label>
                        <input type="text" class="form-control" name="detail-garansi" id="detail-garansi">
                    </div>
                    <div class="mb-3">
                        <label for="masa-garansi" class="form-label">Masa Garansi</label>
                        <input type="text" class="form-control" name="masa-garansi" id="masa-garansi">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div> 
        </div>
    </div>
</section>                   