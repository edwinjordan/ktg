<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Form Customer</li>
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
                    <h3 class="card-title">Form Customer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>
                <?php echo form_open_multipart('Customer/save');?>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="nama-customer" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" name="nama-customer" id="nama-customer">
                    </div>
                    <div class="mb-3">
                        <label for="foto-customer" class="form-label">Foto Customer</label>
                        <input type="file" class="form-control" name="foto-customer" id="foto-customer">
                    </div>
                    <div class="mb-3">
                        <label for="alamat-customer" class="form-label">Alamat Customer</label>
                        <input type="text" class="form-control" name="alamat-customer" id="alamat-customer">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi">
                    </div>
                    <div class="mb-3">
                        <label for="kode-pos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode-pos" id="kode-pos">
                    </div>
                    <div class="mb-3">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control" name="npwp" id="npwp">
                    </div>
                    <div class="mb-3">
                        <label for="telp-kantor" class="form-label">Telephone Kantor</label>
                        <input type="text" class="form-control" name="telp-kantor" id="telp-kantor">
                    </div>
                    <div class="mb-3">
                        <label for="no-hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" name="no-hp" id="no-hp">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="jumlah-point" class="form-label">Jumlah Point</label>
                        <input type="text" class="form-control" name="jumlah-point" id="jumlah-point">
                    </div> -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="id-level" class="form-label">ID Level</label>
                        <input type="text" class="form-control" name="id-level" id="id-level">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                <?php echo form_close(); ?>
    
                </div>
            </div>
        </div>
    </div>
</section>            
