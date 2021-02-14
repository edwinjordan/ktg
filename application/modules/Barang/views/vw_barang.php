<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Barang</li>
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
                    <h3 class="card-title">List Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <?php echo $this->session->flashdata('data'); ?>    
                <a href="<?php echo base_url() . 'Barang/tambah'; ?>" class="btn btn-primary mb-3">Tambah</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead >
                        <tr>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Garansi</th>
                            <th scope="col">Garansi Detail</th>
                            <th scope="col">Garansi Masa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $b) : ?>
                            <tr>
                                <th scope="row"><?php echo $b['fn_id_barang']; ?></th>
                                <td><?php echo $b['fc_kdbarang']; ?></td>
                                <td><?php echo $b['fv_nmbarang']; ?></td>
                                <td><?php echo $b['fn_garansi']; ?></td>
                                <td><?php echo $b['fv_garansi_detail']; ?></td>
                                <td><?php echo $b['fn_garansi_masa']; ?></td>
                                <td>
                                <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Barang/edit/<?php echo $b['fn_id_barang'] ?>">Edit</a>    
                                <a class="btn btn-block btn-danger" href="<?php echo base_url()?>Barang/delete/<?php echo $b['fn_id_barang'] ?>">Hapus</a>
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
    $("#example1").DataTable();
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
