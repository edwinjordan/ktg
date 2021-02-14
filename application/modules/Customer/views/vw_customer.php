

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
                <h1>Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Customer</li>
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
                    <h3 class="card-title">List Customer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?> 
                <a href="<?php echo base_url() . 'Customer/tambah'; ?>" class="btn btn-primary mb-3">Tambah</a>
                <table id="example1"  class="display responsive nowrap" cellspacing="0" width="100%">
                <thead >
                    <tr>
                        <th></th>
                        <th scope="col">ID Customer</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Foto Customer</th>
                        <th scope="col">Alamat Customer</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Kode Pos</th>
                        <th scope="col">NPWP</th>
                        <th scope="col">Telp Kantor</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Jumlah Point</th>
                        <th scope="col">Username</th>
                        <th scope="col">ID Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customer as $c) : ?>
                        <tr>
                            <td scope="row"></td>    
                            <th scope="row"><?php echo $c['fn_id_customer']; ?></th>
                            <td><?php echo $c['fv_email']; ?></td>
                            <td><?php echo $c['fv_nmcustomer']; ?></td>
                            <td><img src="../assets/public/themes/admin-lte/img-customer/<?php echo $c['fv_pic_customer']; ?>" style="width: 65px;"></td>
                            <td><?php echo $c['fv_alamat_customer']; ?></td>
                            <td><?php echo $c['fv_kecamatan']; ?></td>
                            <td><?php echo $c['fv_kota']; ?></td>
                            <td><?php echo $c['fv_provinsi']; ?></td>
                            <td><?php echo $c['fn_kode_pos']; ?></td>
                            <td><?php echo $c['fv_npwp']; ?></td>
                            <td><?php echo $c['fc_telp_kantor']; ?></td>
                            <td><?php echo $c['fv_no_hp']; ?></td>
                            <td><?php echo $c['fn_jumlah_point']; ?></td>
                            <td><?php echo $c['fv_username']; ?></td>
                            <td><?php echo $c['fn_idlevel']; ?></td>
                            <td>
                            <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(-1px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="<?php echo base_url()?>Customer/edit/<?php echo $c['fn_id_customer'] ?>">Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url() . 'Customer/delete/' . $c['fn_id_customer']; ?>">Delete</a>
                                        
                                    </div>
                                    </button>
                                </div> -->
                            <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Customer/edit/<?php echo $c['fn_id_customer'] ?>">Edit</a>    
                            <a class="btn btn-block btn-danger" href="<?php echo base_url()?>Customer/delete/<?php echo $c['fn_id_customer'] ?>">Hapus</a>    
                              
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
