<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ekspedisi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Ekspedisi</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Ekspedisi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>
                <?php echo form_open_multipart('Ekspedisi/save');?>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value=""> 
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="namaEks" class="col-sm-2 col-form-label">Nama Ekspedisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaEks" name="namaEks">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="picEks" class="col-sm-2 col-form-label">PIC Ekspedisi</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto-ekspedisi" id="foto-ekspedisi">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="alamatEks" class="col-sm-2 col-form-label">Alamat Ekspedisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamatEks" name="alamatEks">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="Kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Kecamatan" name="kecamatan">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="Kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Kota" name="kota">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="Provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Provinsi" name="provinsi">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="kodePos" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="kodePos" name="kodePos">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="NPWP" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NPWP" name="npwp">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="telpKantor" class="col-sm-2 col-form-label">Telephon Kantor</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="telpKantor" name="telpKantor">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="noHp" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="noHp" name="noHp">
                        </div>
                    </div>
                </div>
               
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Username" name="username">
                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <div class="mb-3 row">
                        <label for="Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="Password" name="password">
                        </div>
                    </div>
                </div>
              
                <button type="submit" class="btn btn-primary mx-2">Tambah</button>
                <a href="<?php echo base_url('Ekspedisi') ?>" type="reset" class="btn btn-danger px-4" data-dismiss="modal">Kembali</a>
                <?php echo form_close(); ?>
                </div>  
            </div>
        </div>
    </div>
</section>                   