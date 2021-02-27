<style type="text/css">
  
  td.details-control {
      background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
      cursor: pointer;
  }
  tr.shown td.details-control {
      background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
  }
 </style>
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
                    <h3 class="card-title">List Ekspedisi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?> 
                <a href="<?php echo base_url() . 'Ekspedisi/create'; ?>" class="btn btn-primary mb-3">Tambah</a>
                <table id="example1"  class="display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Pic</th>
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kode</th>
                        <th>NPWP</th>
                        <th>Telp Kantor</th>
                        <th>No. Hp</th>
                        <!-- <th>Jumlah Point</th> -->
                        <th>Username</th>
                        <!-- <th>Password</th> -->
                        <th>Id Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($ekspedisi as $e) : ?>
                        <tr>
                            <td scope="row"></td>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $e['fv_email']; ?></td>
                            <td><?= $e['fv_nama_ekspedisi']; ?></td>
                            <!-- <td><img src="../assets/public/themes/admin-lte/img-ekspedisi/<?php echo $e['fv_pic_ekspedisi']; ?>" style="width: 65px;"></td> -->
                            <td><?= $e['fv_pic_ekspedisi']; ?></td>
                            <td><?= $e['fv_alamat_ekspedisi']; ?></td>
                            <td><?= $e['fv_kecamatan']; ?></td>
                            <td><?= $e['fv_kota']; ?></td>
                            <td><?= $e['fv_provinsi']; ?></td>
                            <td><?= $e['fn_kode_pos']; ?></td>
                            <td><?= $e['fv_npwp']; ?></td>
                            <td><?= $e['fv_telp_kantor']; ?></td>
                            <td><?= $e['fv_no_hp']; ?></td>
                            <!-- <td><?= $e['fn_jumlah_point']; ?></td> -->
                            <td><?= $e['fv_username']; ?></td>
                            <!-- <td><?= $e['fv_password']; ?></td> -->
                            <td><?= $e['fn_idlevel']; ?></td>
                            <td>
                            <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(-1px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="<?php echo base_url() . 'Ekspedisi/edit/' . $e['fn_idekspedisi']; ?>">Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url() . 'Ekspedisi/delete/' . $e['fn_idekspedisi']; ?>">Delete</a>
                                        
                                    </div>
                                    </button>
                                </div> -->
                                <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Ekspedisi/ubah/<?php echo $e['fn_idekspedisi'] ?>">Edit</a>    
                                <a class="btn btn-block btn-danger" href="<?php echo base_url()?>Ekspedisi/delete/<?php echo $e['fn_idekspedisi'] ?>">Hapus</a>  
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script>
  $(function () {
    $("#example1").DataTable({
        
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
