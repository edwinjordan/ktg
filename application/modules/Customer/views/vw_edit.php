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
                <?php foreach ($customer as $c) : ?>
                    <?php echo form_open_multipart(base_url() . 'Customer/update/' . $c['fn_id_customer']); ?>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $c['fv_email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama-customer" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" name="nama-customer" id="nama-customer" value="<?php echo $c['fv_nmcustomer']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="foto-customer" class="form-label">Pic Customer</label>
                        <input type="file" class="form-control" name="foto-customer" id="foto-customer" >
                    </div>
                    <div class="mb-3">
                        <img src="<?php echo base_url() ?>assets/public/themes/admin-lte/img-customer/<?php echo $c['fv_pic_customer'] ?>" style="height:150px;width:200px;">
                    </div>    
                    <div class="mb-3">
                        <label for="alamat-customer" class="form-label">Alamat Customer</label>
                        <input type="text" class="form-control" name="alamat-customer" id="alamat-customer" value="<?php echo $c['fv_alamat_customer']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $c['fv_kecamatan']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota" value="<?php echo $c['fv_kota']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?php echo $c['fv_provinsi']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kode-pos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode-pos" id="kode-pos" value="<?php echo $c['fn_kode_pos']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control" name="npwp" id="npwp" value="<?php echo $c['fv_npwp']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telp-kantor" class="form-label">Telephone Kantor</label>
                        <input type="text" class="form-control" name="telp-kantor" id="telp-kantor" value="<?php echo $c['fc_telp_kantor']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no-hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" name="no-hp" id="no-hp" value="<?php echo $c['fv_no_hp']; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="jumlah-point" class="form-label">Jumlah Point</label>
                        <input type="text" class="form-control" name="jumlah-point" id="jumlah-point" value="<?php echo $c['fn_jumlah_point']; ?>">
                    </div> -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $c['fv_username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $c['fv_view_password']; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="id-level" class="form-label">ID Level</label>
                        <input type="text" class="form-control" name="id-level" id="id-level" value="<?php echo $c['fn_idlevel']; ?>">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>  
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>            
